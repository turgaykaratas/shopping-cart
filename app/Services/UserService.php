<?php

namespace App\Services;

use App\User;
use App\Contracts\IUserService;
use Illuminate\Support\Facades\Auth;


class UserService implements IUserService
{
    private $user;

    public function userCreateFromRequest(array $request) : User
    {
        $user = new User([
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        $user->save();

        return $user;
    }

    public function loginByUser(User $user)
    {
        Auth::login($user);
    }

    public function loginByEmailAndPassword(string $email, string $pass) : bool
    {
        return Auth::attempt(['email' => $email, 'password' => $pass]);
    }
}