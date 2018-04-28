<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Session;
use App\Contracts\IProductService;

class ProductController extends Controller
{
    private $productService;
 
    public function __construct(IProductService $productService) {
 
        $this->productService = $productService;
    }

    public function getIndex()
    {
        $products = $this->productService->getAll();

        return view('shop.index', ['products' => $products]);
    }

    public function getRepo()
    { 
        $product = $this->productService->getById(3);

        dd($product);
    }


    public function getAddToCart(Request $request,int $id)
    {
        $product = $this->productService->getById($id);
        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return redirect()->route('product.index');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        $cart = new Cart(Session::get('cart'));
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        return view('shop.checkout', ['total' => $total]);
    }
}
