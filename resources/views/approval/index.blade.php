@extends('layouts.admin')
@section('content')

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Assign</h1>
          <!-- DataTales Example -->

          <div class="container-fluid">
            <ul id="clothingnav1" class="nav nav-tabs" role="tablist">
              <li class="nav-item"> <a class="nav-link active" href="#home20" id="hometab20" role="tab"
                  data-toggle="tab" aria-controls="home" aria-expanded="true">User ({{count($users)}})</a> </li>
              <li class="nav-item"> <a class="nav-link" href="#paneTwo30" role="tab" id="hatstab30" data-toggle="tab"
                  aria-controls="hats">Deposit ({{count($deposit_requests) - count($users) }})</a> </li>
              <li class="nav-item"> <a class="nav-link" href="#paneTwo40" role="tab" id="hatstab40" data-toggle="tab"
                  aria-controls="hats">Witdraw ({{count($withdraw_requests)}})</a> </li>
            </ul>

            <!-- Content Panel -->
            <div id="clothingnavcontent1" class="tab-content">
              <div role="tabpanel" class="tab-pane fade show active" id="home20" aria-labelledby="hometab20">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">New User Request</h6>
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
                            <th>Date</th>
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
              </div>
              <div role="tabpanel" class="tab-pane fade" id="paneTwo30" aria-labelledby="hatstab30">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Deposit Request</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Plan</th>
                            <th>Req Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($deposit_requests as $deposit_request)
                            @if ($deposit_request->user->status == 'approved')

                            <tr>
                                <td class="text-capitalize">{{$deposit_request->user->first_name .' '.$deposit_request->user->last_name}}</td>
                                <td>{{$deposit_request->user->email}}</td>
                                <td>{{$deposit_request->user->plan}}</td>
                                <td>${{$deposit_request->deposit}}</td>
                                <td>{{$deposit_request->created_at->format('Y-m-d')}}</td>
                                <td><a href="{{ route('update.transaction.status',['id'=>$deposit_request->id,'status'=>'approved']) }}" class="badge badge-success">Approve</a>
                                    <a href="{{ route('update.transaction.status',['id'=>$deposit_request->id,'status'=>'approved']) }}" class="badge badge-danger">Delete</a>
                                    <a href="{{ asset($deposit_request->proof) }}" target="_blank" class="badge badge-info">view</a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                      </table>

                      <!-- DataTales end -->

                    </div>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="paneTwo40" aria-labelledby="hatstab40">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Withdraw Requests</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Plan</th>
                            <th>Deposit Amt</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach ($withdraw_requests as $withdraw_request)
                            <tr>
                                <td class="text-capitalize">{{$withdraw_request->user->first_name .' '.$withdraw_request->user->last_name}}</td>
                            <td>{{$withdraw_request->user->email}}</td>
                            <td>{{$withdraw_request->user->plan}}</td>
                            <td>${{$withdraw_request->withdraw}}</td>
                            <td>{{$withdraw_request->created_at->format('Y-mm-d')}}</td>
                            <td><a href="{{ route('update.transaction.status',['id'=>$withdraw_request->id,'status'=>'approved']) }}" class="badge badge-success">Approve</a>
                                <a href="{{ route('update.transaction.status',['id'=>$withdraw_request->id,'status'=>'approved']) }}" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>

                      <!-- DataTales end -->

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection
