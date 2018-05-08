<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Contracts\IUserService;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;

class UserController extends Controller
{
    private $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function getSignup()
    {
        return view('user.signup');
    }

    public function postSignUp(UserRegisterRequest $request)
    {
        $user = $this->userService->userCreateFromRequest($request->validated());

        $this->userService->loginByUser($user);

        return redirect()->route('user.profile');
    }

    public function getSignin()
    {
        return view('user.signin');
    }

    public function postSignin(UserLoginRequest $request)
    {
        if ($this->userService->loginByEmailAndPassword($request->input('email'),$request->input('password'))) {
            return redirect()->route('user.profile');
        }

        return redirect()->back();
    }

    public function getProfile()
    {
        return view('user.profile');
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('product.index');
    }
}
