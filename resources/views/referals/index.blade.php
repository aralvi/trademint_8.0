@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Team</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h1 class="h3 mb-2 text-gray-800">Your Team</h1>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email </th>
                      <th>Invested</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($referals as $referal)
                    <tr>
                        <td><a href="user-associate-profile.html">{{$referal->first_name. ' '. $referal->last_name}}</a></td>
                        <td>{{$referal->email}}</td>
                        <td>${{(int)$referal->transactions->pluck('deposit')->sum()-(int)$referal->transactions->pluck('withdraw')->sum()}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection
