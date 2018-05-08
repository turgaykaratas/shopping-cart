<?php

namespace App\Contracts;

use App\Cart;
use App\Product;

interface ICartService
{
    public function getCart(): Cart;
    public function addProductToCart(Product &$product);
}