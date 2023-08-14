{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.admin')
@section('content')
    @if (Auth::user()->role == 'admin')
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Admin Dashboard</h1>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Total Investment
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{(int)$users->pluck('total_amount')->sum() - (int)$interest_distribution}}</div>
                            </div>
                            <div class="col-auto"> <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Total User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($users)}}</div>
                            </div>
                            <div class="col-auto"> <i class="fas fa-users fa-2x text-gray-300"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tasks Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Associate Count
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{count($users->whereNotNull('referral_email'))}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto"> <i class="fas fa-users fa-2x text-gray-300"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Intrest Distribution
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{$interest_distribution}}</div>
                            </div>
                            <div class="col-auto"> <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Plan</th>
                                <th>Investment</th>
                                <th>Start date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->first_name.' '.$user->last_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->plan}}</td>
                                <td>${{$user->total_amount}}</td>
                                <td>{{$user->created_at->format('Y-m-d')}}</td>
                                <td><a href="{{route('user',$user->id)}}" class="badge badge-success">View</a></td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>

                    <!-- DataTales end -->


                </div>
            </div>
        </div>
    @else
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Income</h1>
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Total Investment
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    ${{ (int) Auth::user()->total_amount }}
                                </div>
                            </div>
                            <div class="col-auto"> <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Monthly Earning
                                    {{ $setting[Auth::user()->plan . '_plan_interest'] }}%</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    ${{ ($setting[Auth::user()->plan . '_plan_interest'] / 100) *((int) Auth::user()->transactions->pluck('deposit')->sum() -(int) Auth::user()->transactions->pluck('withdraw')->sum()) }}
                                </div>
                            </div>
                            <div class="col-auto"> <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tasks Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Associate Earning
                                    {{ $setting['referral_interest'] }}% </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            ${{(int)Auth::user()->total_amount >=1200? ($setting['referral_interest'] / 100) * ((int) $team_investment):0 }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto"> <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Team Investment
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    ${{ (int) $team_investment }}
                                </div>
                            </div>
                            <div class="col-auto"> <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Downline Count : {{ count(Auth::user()->transactions) }}</h6>
                <br>
                <a href="{{ route('deposit.index') }}" class="btn btn-primary btn-lg active" role="button"
                    aria-pressed="true">Add
                    Money</a>
                <a href="{{ route('withdraw.index') }}" class="btn btn-secondary btn-lg active" role="button"
                    aria-pressed="true">Withdraw Amount</a>
                <div>Deposit and Withdraw only Active Beetween 1st to 5th Every Month </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Debit </th>
                                <th>Credit</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $total_amount = 0;
                                $total_withdraw = 0;
                            @endphp
                            @foreach (Auth::user()->transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->created_at->format('d M Y') }}</td>
                                    <td>${{ $transaction->withdraw }}</td>
                                    <td>${{ $transaction->deposit }}</td>
                                    <td>${{ (int) ($total_amount = (int) $total_amount + (int) $transaction->deposit - (int) ($total_withdraw = (int) $total_withdraw + (int) $transaction->withdraw)) }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection
