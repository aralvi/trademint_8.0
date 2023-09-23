<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PaymentProofs;
use App\Models\Settings;
use App\Models\Transaction;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $settings = Settings::select(['enable_registration', 'min_deposit'])->first();
        if ($settings->enable_registration == 1) {
            return view('auth.register', compact('settings'));
        } else {
            return "Sorry this service is currently unavailable, If you are already registered user you can login, Thank you!";
        }
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'binance_email' => ['required', 'string', 'email', 'max:255'],
            'referral_email' => ['required', 'string', 'email', 'exists:users,email'],
            'binance_id' => ['sometimes', 'string'],
            'mobile' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'initial_invest' => ['required'],
            'media' => ['required','array','size:4'],
            'media.*' => ['required', 'image', 'mimes:jpeg,png,jpg,JPEG,JPG,PNG,gif,svg'],
            'avatar' => ['string'],
            'plan' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (isset($data['referral_email'])) {
            $referral_user = User::select('id')->whereEmail($data['referral_email'])->first();
        }
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'binance_email' => $data['binance_email'],
            'referral_email' => $data['referral_email'],
            'referral_id' => isset($referral_user) ? $referral_user->id : null,
            // 'binance_id' => $data['binance_id'],
            'mobile' => $data['mobile'],
            'gender' => $data['gender'],
            'total_amount' => $data['initial_invest'],
            // 'avatar' => $data['avatar'],
            'plan' => $data['plan'],
            'password' => Hash::make($data['password']),
        ]);


        foreach ($data['media'] as $key => $media) {
            $paymentProof = new PaymentProofs();
            $media_destination_name = $media->getClientOriginalName().'_'.time() . '.' . $media->getClientOriginalExtension();
            $media_destination_folder = "/uploads/medias/user/paymentproofs/";
            $media->move(public_path($media_destination_folder), $media_destination_name);
            $paymentProof->media = $media_destination_folder . $media_destination_name;
            $paymentProof->user_id = $user->id;
            $paymentProof->save();
        }
        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->referring_id = isset($referral_user) ? $referral_user->id : null;
        $transaction->deposit = $data['initial_invest'];
        $transaction->request_type = 'deposit';
        $transaction->save();
return redirect('/register')->with('success', 'successfully registered please wait for admin approval, Thank you!');

    }
}
