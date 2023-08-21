<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

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
            $user->total_amount = (int)$user->total_amount + ((int)$transaction->deposit - (int)$transaction->withdraw);
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
}
