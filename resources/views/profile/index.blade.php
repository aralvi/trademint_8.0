@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Profile</h1>
    <section class="vh-100" style="background-color: #00000;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-25">
                <div class="col col-lg-10 mb-4 mb-lg-0">
                    <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; background: #3158C9;">
                                <img src="{{ isset($user->avatar) ? asset($user->avatar) : 'https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp' }}"
                                    alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                <h5 class="text-capitalize">{{ $user->first_name . ' ' . $user->last_name }}</h5>

                                <a class="btn btn-primary" href="{{ route('profile.edit',['id'=>$user->id]) }}" role="button">Edit
                                    Profile</a><br> <br>
                                @if (Auth::user()->role == 'admin' && $user->status =='pending')
                                    <a class="btn btn-success" href="{{ route('update.user.status',['id'=>$user->id,'status'=>'approved']) }}" role="button">Approve</a><br> <br>
                                    <a class="btn btn-danger" href="{{ route('update.user.status',['id'=>$user->id,'status'=>'deleted']) }}" role="button">Delete</a>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6><strong>Investor Details</strong></h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6><strong>Email</strong></h6>
                                            <p class="text-muted">{{ $user->email }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6><strong>Phone</strong></h6>
                                            <p class="text-muted">{{ $user->mobile }}</p>
                                        </div>
                                    </div>
                                    <h6><strong>Earning</strong></h6>

                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6><strong>Total Investment</strong></h6>
                                            <p class="text-muted">{{ $user->total_amount }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6><strong>Sponcer Email</strong></h6>
                                            <p class="text-muted">{{ $user->referal_email }}</p>
                                        </div>
                                    </div>

                                    <h6><strong>Transaction Details</strong></h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                        <div class="col-6 mb-3">
                                            <h6><strong>Binance Email</strong></h6>
                                            <p class="text-muted">{{ $user->binance_email }}</p>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h6><strong>Binance ID</strong></h6>
                                            <p class="text-muted">{{ $user->binance_id }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
