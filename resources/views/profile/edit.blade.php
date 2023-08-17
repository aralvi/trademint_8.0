

@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Profile</h1>



    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->

        <hr class="mt-0 mb-4">
        @include('components.messages')
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img src="{{isset($user->avatar)?asset($user->avatar):'http://bootdey.com/img/Content/avatar/avatar1.png'}}" id="blah" alt="" width="198"
                            height="200" class="img-account-profile rounded-circle mb-2">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB
                        </div>
                        <!-- Profile picture upload button-->

                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <form action="{{ route('profile.update',$user->id) }}" method="post" enctype="multipart/form-data">
 @csrf
        @method('patch')
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <input type="file"  class="form-control-file" name="avatar" id="imgInp">
                                </div>
                            <button class="btn btn-primary" type="submit">Upload Photo</button>

                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update',$user->id) }}" >
        @csrf
        @method('patch')
                            <!-- Form Group (username)-->
                            <!-- Form Row-->
                            <h3><strong> Personal Details</strong></h3>
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" type="text" name="first_name"
                                        placeholder="readonly input" value="{{$user->first_name}}" {{Auth::user()->role == 'admin' ?'':'readonly'}}>

                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text" name="last_name"
                                        placeholder="Enter your last name" value="{{$user->last_name}}" {{Auth::user()->role == 'admin' ?'':'readonly'}}>
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" name="email"
                                    placeholder="Enter your email address" value="{{$user->email}}" {{Auth::user()->role == 'admin' ?'':'readonly'}}>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <hr class="mt-0 mb-4">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" type="tel" name="mobile"
                                        placeholder="Enter your phone number" value="{{$user->mobile}}">
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Plan</label>
                                    <input class="form-control" id="inputBirthday" type="text" name="plan"
                                        placeholder="Enter your birthday" value="{{$user->plan}}" {{Auth::user()->role == 'admin' ?'':'readonly'}}>
                                </div>
                            </div>
                            <h3><strong> Transaction Details</strong></h3>
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone4">Binance Email:</label>
                                    <input class="form-control" id="inputBinanceEmail" type="email" name="binance_email"
                                        placeholder="Enter your binance email" value="{{$user->binance_email}}" {{Auth::user()->role == 'admin' ?'':'readonly'}}>
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday3">Binance ID:</label>
                                    <input class="form-control" type="text" name="binance_id"
                                        placeholder="Enter your binance id" value="{{$user->binance_id}}">
                                </div>
                            </div>
                            <h3>Your ID:</h3>
                            @foreach ($user->paymentProofs as $paymentProof)
                            <img src="{{asset($paymentProof->media)}}" width="198" height="264" alt="" />

                            @endforeach
                            <br>
                            <br>
                            <br>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
@endsection
