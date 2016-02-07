<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use ZaWeb\Core\Controllers\AbstractController;
use ZaWeb\Profile\Models\Profile;
use ZaWeb\Profile\Models\ProfileAttachment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * @Resource("profile")
 * @Middleware("auth")
 */
class ProfileController extends AbstractController
{
    public function __construct()
    {
        if (Auth::user()) {
            $this->profile = Auth::user()->profile;
            $this->user = Auth::user();
        }
    }

    public function index(Profile $profile)
    {
        return \ProfileService::viewProfile(
            Profile::with('user')->with('city')->with('advertisements')->with('avatar')
                ->where('user_id', Auth::user()->id)->first());

    }

    public function show(Profile $profile)
    {
        return \ProfileService::viewProfile($profile);
    }

    /**
     * @Get("/profile/{user_name}/edit", as="profiles.edit")
     */
    public function edit(ProfileAttachment $profileAttachment)
    {

        return view('profile::update', [
            'profile' => $this->profile,
            'profileAttachment' => $profileAttachment,
            'user' => $this->user,
        ]);
    }

    /**
     * @Post("/profile/{id}/update", as="profiles.update")
     */
    public function update(ProfileRequest $request)
    {
        \ProfileService::updateProfile($request, $this->profile);
        return \Redirect::to('/profile');
    }

    /**
     * @Post("/profile/{id}/upload", as="profiles.upload")
     */
    public function store(ProfileRequest $request)
    {
        \ProfileService::uploadImage($request, $this->profile);
        return \Redirect::to('/profile');
    }

    /**
     * @Post("/profile/{id}/user", as="profiles.user")
     */
    public function updateUser(ProfileRequest $request)
    {
        $user = \Auth::user();
        //Is the old password correct?
        if(!Hash::check(Input::get('old_password'), $user->password)){
            \Session::flash('message', 'К сожалению, пароли не совпадают, попробуйте еще раз.');
            return Redirect::back()->with('incorrectPassword', true);
        }
        else
        {
            \Users::update($request, $this->user);
        }
        if (!Input::has('password')) {
            \Users::update($request, $this->user);
        } else {
            \Users::update(['password' => bcrypt(Input::get('password'))], $this->user);
        }
        return \Redirect::to('/profile');
    }

    /**
     * @Get("/profile/{id}/payments", as="profiles.payments")
     */
    public function transactionShow()
    {
        $transactions = Payment::all();
        return view('transaction.show', compact('transactions'));
    }
}