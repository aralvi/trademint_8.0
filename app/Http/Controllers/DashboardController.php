<?php

namespace App\Http\Controllers;

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
            return view('dashboard', compact('users'));
        } else {
            $transactions = Transaction::whereReferringId(Auth::user()->id)->whereStatus('approved')->get();
            $setting = Settings::select([Auth::user()->plan . '_plan_interest', 'referral_interest'])->first()->toArray();
            $team_investment = Transaction::select(['withdraw', 'deposit'])->whereStatus('approved')->whereReferringId(Auth::user()->id)->get();
            return view('dashboard', compact('transactions', 'setting'));
        }
    }
}
