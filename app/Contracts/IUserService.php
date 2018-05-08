<?php

namespace App\Contracts;

use App\Cart;
use App\Product;
use App\User;

interface IUserService
{
    public function userCreateFromRequest(array $request) : User;
    public function loginByUser(User $user);
    public function loginByEmailAndPassword(string $email, string $pass) : bool;    
}