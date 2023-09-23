<?php

namespace App\Http\Controllers;

use App\Models\MonthlyCommission;
use App\Models\Settings;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereStatus('pending')->get();
        $withdraw_requests = Transaction::whereRequestType('withdraw')->whereStatus('pending')->get();
        $deposit_requests = Transaction::whereRequestType('deposit')->whereStatus('pending')->get();
        return view('approval.index', compact('users', 'withdraw_requests', 'deposit_requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showUser(string $id)
    {
        $user = User::whereId($id)->first();
        return view('profile.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(string $id, string $status)
    {
        $user =  User::whereId($id)->first();
        if($status == 'deleted'){
            $user->delete();
        }else{
            $user->status = $status;
            $user->save();
            $transaction = Transaction::whereUserId($id)->first();
            $transaction->status = $status;
            $transaction->save();
        }
        return redirect('admin/requests');
    }
    /**
     * Update the specified resource in storage.
     */
    public function updateTransactionRequest(string $id, string $status)
    {
        $transaction = Transaction::whereId($id)->first();
        $transaction->status = $status;
        $transaction->save();
        if ($status == 'approved') {
            $user = User::whereId($transaction->user_id)->first();
            if ($transaction->request_type == 'withdraw') {
                if ($transaction->withdraw == ($user->total_amount + $user->available_withdraw)) {
                    $user->total_amount = (int)$user->total_amount + (int)$user->available_withdraw - ((int)$transaction->withdraw);
                    $user->available_withdraw = (int)$user->total_amount ;
                }else{

                    $user->available_withdraw = (int) $user->available_withdraw - (int)$transaction->withdraw;
                }
            }else{
                // $user->total_amount = (int)$user->total_amount + ((int)$transaction->deposit - (int)$transaction->withdraw);
                $user->total_amount = (int)$user->total_amount + ((int)$transaction->deposit);

            }
            $user->save();
        }
        return redirect('admin/requests');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generateCertificate()
    {
        ini_set('max_execution_time', 1800); //3 minutes
// $customPaper = array(0,0,500.00,1000.80);


        $pdf = PDF::loadView('certificate');
        // return $pdf->stream('template.pdf');
        return $pdf->download('trademint-certificate.pdf');
    }




    function runCron() {
        $settings = Settings::first();
        $users = User::where('role', 'user')->get();
        foreach ($users as $key => $user) {
            $plan_interest = $user->plan . '_plan_interest';
            $referal_users = User::where('referral_id', $user->id)->wherePlan('standard')->pluck('id')->toArray();
            $referral_investment = $user->plan == 'standard' && $user->total_amount >= 1200 ? (int)Transaction::whereIn('user_id', $referal_users)->pluck('deposit')->sum() - (int)Transaction::whereIn('user_id', $referal_users)->pluck('withdraw')->sum() : 0;
            $monthly_commission = new MonthlyCommission();
            $monthly_commission->user_id = $user->id;
            $monthly_commission->investment = $user->total_amount;
            $monthly_commission->plan = $user->plan;
            $monthly_commission->interest_percent = $settings->$plan_interest;
            $monthly_commission->referral_investment = $referral_investment;
            $monthly_commission->referral_interest_percent = $settings->referral_interest;
            $monthly_commission->total_amount = (int)$user->total_amount + (int) $user->available_withdraw + (int)(((int)$settings->$plan_interest / 100) * (int)$user->total_amount) + (int)(((int)$settings->referral_interest / 100) * (int)$referral_investment);
            $monthly_commission->total_interest = (int)(((int)$settings->$plan_interest / 100) * ((int)$user->total_amount + (int) $user->available_withdraw)) + (int)(((int)$settings->referral_interest / 100) * (int)$referral_investment);
            $monthly_commission->save();
            // $user->total_amount = (int) $user->total_amount + (int) $monthly_commission->total_interest;
            $user->total_amount = (int) $user->total_amount + (int) $user->available_withdraw;
            $user->available_withdraw = (int) $monthly_commission->total_interest;
            $user->save();
            $transaction = new Transaction();
            $transaction->request_type = 'interest';
            $transaction->status = 'approved';
            $transaction->deposit = $monthly_commission->total_interest;
            $transaction->user_id = $user->id;
            $transaction->referring_id = $user->referral_id;
            $transaction->save();
        }
        return back();
    }
}
