<?php

namespace App\Services;

use App\Contracts\ICartService;
use App\Cart;
use Illuminate\Support\Facades\Session;
use App\Product;

class CartService implements ICartService
{
    private $cart;

    public function setCart()
    {
        if (!$this->cart) {
            $cart = Session::has('cart') ? Session::get('cart') : null;

            $this->cart = new Cart($cart);
        }
    }

    public function getCart() : Cart
    {
        $this->setCart();

        return $this->cart;
    }

    public function addProductToCart(Product &$product)
    {
        $this->setCart();

        $storedItem = ['qty' => 0, 'price' => $product->price, 'item' => $product];

        if ($this->cart->items) {
            if (array_key_exists($product->id, $this->cart->items)) {
                $storedItem = $this->cart->items[$product->id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $product->price * $storedItem['qty'];

        $this->cart->items[$product->id] = $storedItem;

        $this->setCartTotalPrice();

        Session::put('cart', $this->cart);
    }

    public function setCartTotalPrice()
    {
        $this->setCart();

        $qty = 0;
        $price = 0;
        foreach ($this->cart->items as $item) {
            $qty += $item['qty'];
            $price += $item['price'];
        }

        $this->cart->totalQty = $qty;
        $this->cart->totalPrice = $price;
    }

    public function getCartTotalPrice()
    {
        $this->setCart();

        $total = $this->cart->totalPrice ?? 0;

        return $total;
    }
}