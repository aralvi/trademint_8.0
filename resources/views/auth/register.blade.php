

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trademint Register</title>

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
                                    <input type="text" class="form-control form-control-user" required value="{{old('name')}}" name="name" id="exampleInputEmail"
                                        placeholder=" Name">
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
                                        <label for="plan">Select Your Plan:</label>
                                        <select class="form-control" required value="{{old('plan')}}" name="plan" id="plan">
                                            <option data-min="1200" value="international">International</option>
                                            <option data-min="{{$settings->min_deposit}}" value="standard">Standard</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user"
                                            id="amount" min="1200" placeholder="please enter you amount" required value="{{old('initial_invest')}}" name="initial_invest">
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



    // Get references to the select element and input element
        const selectOption = document.getElementById('plan');
        const inputValue = document.getElementById('amount');

        // Add an event listener to the select element
        selectOption.addEventListener('change', function() {
            const selectedOptionAttribute = selectOption.options[selectOption.selectedIndex];
            const selectedMinValue = selectedOptionAttribute.getAttribute('data-min');
            console.log(selectedMinValue);
            // Set the input value to the selected option's value
            inputValue.min = selectedMinValue;
        });
});
</script>


</body>

</html>
