<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Settings::get()->first();
        return view('settings', compact('setting'));
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
        if (Settings::exists()) {
            $settings = Settings::get()->first();
        } else {
            $settings = new Settings();
        }
        $settings->min_deposit = $request->min_deposit;
        $settings->max_deposit = $request->max_deposit;
        // $settings->min_withdraw = $request->min_withdraw;
        // $settings->max_withdraw = $request->max_withdraw;
        $settings->enable_investment = $request->enable_investment;
        $settings->enable_registration = $request->enable_registration;
        $settings->compound = $request->compound;
        $settings->international_plan_interest = $request->international_plan_interest;
        $settings->standard_plan_interest = $request->standard_plan_interest;
        // $settings->goal_plan_interest = $request->goal_plan_interest;
        $settings->referral_interest = $request->referral_interest;
        $settings->save();
        return back()->with('success', 'Settings has been updated');
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Settings $settings)
    {
        $settings->update($request->all());
        // $settings->min_deposit = $request->min_deposit;
        // $settings->max_deposit = $request->max_deposit;
        // $settings->min_withdraw = $request->min_withdraw;
        // $settings->max_withdraw = $request->max_withdraw;
        // $settings->enable_investment = $request->enable_investment;
        // $settings->enable_registration = $request->enable_registration;
        // $settings->compound = $request->compound;
        // $settings->international_plan_interest = $request->international_plan_interest;
        // $settings->standard_plan_interest = $request->standard_plan_interest;
        // $settings->goal_plan_interest = $request->goal_plan_interest;
        // $settings->referral_interest = $request->referral_interest;
        // $settings->save();
        return back()->with('success', 'Settings has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
