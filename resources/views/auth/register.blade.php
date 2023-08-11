{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('user/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('user/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"><img src="{{asset('user/img/bg.jpg')}}" class="img-fluid h-100"
                            alt="Responsive image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            @include('components.messages')
                            <form class="user" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" required value="{{old('first_name')}}" name="first_name" id="exampleInputEmail"
                                        placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" required value="{{old('last_name')}}" name="last_name" id="exampleInputEmail"
                                        placeholder="last Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" required value="{{old('email')}}" name="email" id="exampleInputEmail1"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control form-control-user" required value="{{old('mobile')}}" name="mobile" id="exampleInputEmail3"
                                        placeholder="Mobile No.">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" required value="{{old('password')}}" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" required value="{{old('password_confirmation')}}" name="password_confirmation">
                                    </div>
                                </div>
                                <label class="small mb-1" for="inputFirstName">Your Gender: </label>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" value="male" type="radio"  value="{{old('gender')}}" name="gender"
                                            id="flexRadioDefault1" checked>
                                        <label class="small mb-1" for="flexRadioDefault1"> Male </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="female" type="radio"  value="{{old('gender')}}" name="gender"
                                            id="flexRadioDefault2" >
                                        <label class="small mb-1" for="flexRadioDefault2"> Female </label>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user"
                                            id="exampleInputEmail2" min="{{$settings->min_deposit}}" placeholder="Min ${{$settings->min_deposit}}" required value="{{old('initial_invest')}}" name="initial_invest">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Your Plan:</label>
                                        <select class="form-control" required value="{{old('plan')}}" name="plan" id="exampleFormControlSelect1">
                                            <option value="international">International</option>
                                            <option value="standard">Standard</option>
                                            <option value="goal">Goal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                            id="exampleInputEmail4" required value="{{old('binance_email')}}" name="binance_email" placeholder="Your Binance Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="email"  value="{{old('referral_email')}}" name="referral_email" class="form-control form-control-user"
                                            id="exampleInputEmail5" placeholder="Sponcer Email" required>
                                    </div>
                                    <label class="small mb-1" for="inputFirstName">Upload ID and Payment Proof:</label>
                                    <div class="form-group">
                                        <input class="form-control form-control-user" required value="{{old('media')}}" name="media[]" type="file"
                                            id="imageInput" multiple>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" value="{{old('terms')}}" name="terms" type="checkbox" value=""
                                                id="invalidCheck2" required>
                                            <label class="form-check-label" for="invalidCheck2"> I Agree your all <a
                                                    href="https://trademint.xyz/30/privacy-policy-2/"
                                                    target="new">Terms and Conditions.</a> </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block"> Register
                                    Account </button>

                            </form>
                            <hr>
                            <div class="text-center"> <a class="small" href="{{ route('password.request') }}">Forgot
                                    Password?</a> </div>
                            <div class="text-center"> <a class="small" href="{{route('login')}}">Already have an account?
                                    Login!</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('user/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('user/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('user/js/sb-admin-2.min.js') }}"></script>
<script>
$(document).ready(function() {
  const maxFiles = 4;
  $('#imageInput').on('change', function() {
    // Check the number of selected files
    const selectedFiles = $(this)[0].files.length;
    if (selectedFiles > maxFiles || selectedFiles < maxFiles) {
      alert(`You can only select up to ${maxFiles} images.`);
      // Clear the input field to prevent the user from proceeding with additional files.
      $(this).val('');
    }
  });
});
</script>


</body>

</html>
