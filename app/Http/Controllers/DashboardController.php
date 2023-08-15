<?php

namespace App\Http\Controllers;

use App\Models\MonthlyCommission;
use App\Models\Settings;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::user()->role == 'admin') {
            $users = User::whereStatus('approved')->whereRole('user')->get();
            $interest_distribution = (int) MonthlyCommission::all()->pluck('total_interest')->sum() ;
            return view('dashboard', compact('users', 'interest_distribution'));
        } else {
            $transactions = Transaction::whereReferringId(Auth::user()->id)->whereStatus('approved')->get();
            $setting = Settings::select([Auth::user()->plan . '_plan_interest', 'referral_interest'])->first()->toArray();
            $team_investment = User::whereReferralId(Auth::user()->id)->wherePlan('standard')->pluck('total_amount')->sum();
            return view('dashboard', compact('transactions', 'setting', 'team_investment'));
        }
    }
}
