@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Settings</h1>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('settings.store') }}" method="POST">
                            <!-- Form Group (username)-->
                            <!-- Form Row-->
                            @csrf
                            <h3><strong> Deposit</strong></h3>
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Min Deposit</label>
                                    <input class="form-control" id="inputFirstName" name="min_deposit" type="number"
                                        placeholder="Enter amount"
                                        value="{{ isset($setting->min_deposit) ? $setting->min_deposit : '' }}">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Max Deposit</label>
                                    <input class="form-control" id="inputLastName" name="max_deposit" type="number"
                                        placeholder="Enter amount"
                                        value="{{ isset($setting->max_deposit) ? $setting->max_deposit : '' }}">
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName2">Enable Investment</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1"
                                            name="enable_investment" id="flexRadioDefault1"
                                            {{ isset($setting->enable_investment) && $setting->enable_investment == '1' ? 'checked' : '' }}>
                                        <label class="small mb-1" for="flexRadioDefault1"> Yes </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="0"
                                            name="enable_investment" id="flexRadioDefault2"
                                            {{ isset($setting->enable_investment) && $setting->enable_investment == '0' ? 'checked' : '' }}>
                                        <label class="small mb-1" for="flexRadioDefault2"> No </label>
                                    </div>
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName2">Enable User Registration</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1"
                                            name="enable_registration" id="flexRadioDefault44"
                                            {{ isset($setting->enable_registration) && $setting->enable_registration == '1' ? 'checked' : '' }}>
                                        <label class="small mb-1" for="flexRadioDefault44"> Yes </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="0"
                                            name="enable_registration" id="flexRadioDefault34"
                                            {{ isset($setting->enable_registration) && $setting->enable_registration == '0' ? 'checked' : '' }}>
                                        <label class="small mb-1" for="flexRadioDefault2"> No </label>
                                    </div>
                                </div>
                            </div>
                            <h3><strong> Witdraw</strong></h3>
                            <!-- Form Row        -->
                            <!-- Form Group (email address)-->
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <hr class="mt-0 mb-4">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Min Witdraw</label>
                                    <input class="form-control" id="inputPhone" type="number" name="min_withdraw"
                                        placeholder="Enter amount"
                                        value="{{ isset($setting->min_withdraw) ? $setting->min_withdraw : '' }}">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Max Withdraw Limit</label>
                                    <input class="form-control" id="inputBirthday" type="text" name="max_withdraw"
                                        placeholder="Enter amount"
                                        value="{{ isset($setting->max_withdraw) ? $setting->max_withdraw : '' }}">
                                </div>
                            </div>
                            <h3><strong> Commision&nbsp;</strong></h3>
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone4">International Plan (%)</label>
                                    <input class="form-control" id="international" name="international_plan_interest"
                                        type="number" placeholder="Enter interest percentage"
                                        value="{{ isset($setting->international_plan_interest) ? $setting->international_plan_interest : '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone2">Standard Plan (%)</label>
                                    <input class="form-control" id="inputPhone2" name="standard_plan_interest"
                                        type="number" placeholder="Enter interest percentage"
                                        value="{{ isset($setting->standard_plan_interest) ? $setting->standard_plan_interest : '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone3">Goal Plan (%)</label>
                                    <input class="form-control" id="inputPhone3" name="goal_plan_interest"
                                        type="number" placeholder="Enter interest percentage"
                                        value="{{ isset($setting->goal_plan_interest) ? $setting->goal_plan_interest : '' }}">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday3">Referal Interest (%)</label>
                                    <input class="form-control" type="number" name="referral_interest"
                                        placeholder="Enter interest percentage"
                                        value="{{ isset($setting->referral_interest) ? $setting->referral_interest : '' }}">
                                </div>
                                <br>
                                <br>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName3">Compound</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="compound"
                                            id="flexRadioDefault3" value="1"
                                            {{ isset($setting->compound) && $setting->compound == '1' ? 'checked' : '' }}>
                                        <label class="small mb-1" for="flexRadioDefault3"> Yes </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="compound"
                                            id="flexRadioDefault4" value="0"
                                            {{ isset($setting->compound) && $setting->compound == '0' ? 'checked' : '' }}>
                                        <label class="small mb-1" for="flexRadioDefault4"> No </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!-- Save changes button-->
                            <button type="submit" class="btn btn-success" id="liveToastBtn">Save Changes</button>


                            <button class="btn btn-primary" type="reset">Cencel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
