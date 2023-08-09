<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function deposit()
    {
        return view('money.deposit');
    }
    /**
     * Display a listing of the resource.
     */
    public function withdraw()
    {
        return view('money.withdraw');
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
        $request->validate([
            'proof' => ['required_if:request_type,deposit', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'amount' => ['required', 'numeric'],
            'request_type' => ['required', 'in:deposit,withdraw']
        ]);
        $transaction = new Transaction();
        if ($request->request_type == 'deposit') {
            $transaction->deposit = $request->amount;
        } else {
            $transaction->withdraw = $request->amount;
        }
        $transaction->user_id = $request->user()->id;
        $transaction->referring_id = $request->user()->referral_id;
        $transaction->request_type = $request->request_type;
        if ($request->hasFile('proof')) {
            $media_destination_name = time() . '.' . $request->proof->getClientOriginalExtension();
            $media_destination_folder = "/uploads/medias/user/paymentproofs/";
            $request->proof->move(public_path($media_destination_folder), $media_destination_name);
            $transaction->proof = $media_destination_folder . $media_destination_name;
        }
        $transaction->save();
        return back()->with('success', 'Request submitted check your dashboard after 24hr');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
