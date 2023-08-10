<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        return view('profile.index', [
            'user' => $request->user(),
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit($id): View
    {

        return view('profile.edit', [
            'user' => User::findOrFail($id),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request,$id): RedirectResponse
    {
        $user = User::findOrFail($id);
        if ($request->hasFile('avatar')) {

            $avatar_destination_name = time() . '.' . $request->avatar->getClientOriginalExtension();
            $avatar_destination_folder = "/uploads/medias/user/avatar/";
            $request->avatar->move(public_path($avatar_destination_folder), $avatar_destination_name);
            $user->avatar = $avatar_destination_folder . $avatar_destination_name;
        }
        if($request->has('first_name')){

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->plan = $request->plan;
        $user->binance_email = $request->binance_email;
        $user->binance_id = $request->binance_id;
    }

        $user->save();

        return Redirect::route('profile.edit',$user->id)->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
