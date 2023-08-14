<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referals = User::whereReferralEmail(Auth::user()->email)->whereStatus('approved')->wherePlan('standard')->get();
        $total_investment = (int)Transaction::whereIn('user_id', $referals->pluck('id'))->whereStatus('approved')->sum('deposit') - (int)Transaction::whereIn('user_id', $referals->pluck('id'))->whereStatus('approved')->sum('withdraw');
        return view('referals.index', compact('referals', 'total_investment'));
    }

}
