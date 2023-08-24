@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Change Password</h1>



    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->

        <hr class="mt-0 mb-4">
        @include('components.messages')
        <div class="row">
            <div class="col-xl-12">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-body">
                       <form action="{{ route('update_password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="old_password">Old Password*</label>
                            <input id="old_password" name="old_password" type="password" class="form-control" value="{{ old('old_password') }}" autocomplete="first_name" placeholder="Enter Old Password" />
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password*</label>
                            <input id="new_password" name="new_password" type="password" class="form-control" value="{{ old('new_password') }}" placeholder="Enter New Password" autocomplete="new-password" />
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm New Password*</label>
                            <input id="password-confirm" type="password" class="form-control" name="new_password_confirmation" placeholder="Re-Type New Password" autocomplete="new-password" />
                        </div>
                        <button type="button" class="btn btn-secondary btn-md" onclick="history.back()"><i class="fas fa-hand-point-left"></i> Go Back</button>
                        <button type="submit" class="btn btn-success btn-md"><i class="far fa-check-circle"></i> Save Changes</button>
                    </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

