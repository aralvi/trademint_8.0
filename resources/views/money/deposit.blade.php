@extends('layouts.admin')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Add Money</h1>
<!-- DataTales Example -->
<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->

    <hr class="mt-0 mb-4">
    <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <br>
                <div class="card mb-4 mb-xl-0">
                    <p><img src="{{asset('user/img/qr.jpg')}}" alt="" width="300" /></p>
                    <p><strong>Instruction</strong><br>
                    </p>
                    <p> Deposit Money First on Binance then, submit form with payment proof.&nbsp;&nbsp;
                    </p>
                    <p> your amount will be reflecting in 24hrs in your Trademint account. </p>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{route('transaction.store')}}" method="POST" id="transaction_form" enctype="multipart/form-data">
                            @csrf
                            <!-- Form Row-->
                            <h3><strong> Add Money</strong></h3>
                            @include('components.messages')
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName2">Amount:</label>
                                    <input class="form-control" id="inputLastName" type="number" name="amount"
                                        placeholder="Enter deposit amount" value="">

                                        <input type="hidden" name="request_type" value="deposit">
                                </div>

                            </div>
                            <div class="custom-file">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName">Proof Image:</label>
                                    <input type="file" class="form-control-file" name="proof" id="exampleFormControlFile1">
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <!-- Form Group (email address)--> <br> <br>

                            <!-- Form Row-->

                            <!-- Save changes button--><br>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
