@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Withdraw Amount</h1>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->

        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4">
                    <div class="card-header">
                        Instruction
                    </div>
                    <div class="card-body">
                        Amount will be transfer in your bank account in 3 Working Days.
                    </div>
                </div>

            </div>
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{route('transaction.store')}}" method="POST" id="transaction_form">
                            @csrf
                            <h3><strong> Withdraw Amount</strong></h3>
                            @include('components.messages')
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Amount</label>
                                    <input class="form-control" id="inputFirstName" min="1" max="{{Auth::user()->available_withdraw}}" type="number" name="amount"
                                        placeholder="Enter your withdraw amount" value="" >
                                        <input type="hidden" name="request_type" value="withdraw">
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

