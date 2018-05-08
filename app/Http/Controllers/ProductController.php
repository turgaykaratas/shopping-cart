<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Session;
use App\Contracts\IProductService;
use App\Contracts\ICartService;

class ProductController extends Controller
{
    private $productService;
    private $cartService;
 
    public function __construct(IProductService $productService, ICartService $cartService) {
 
        $this->productService = $productService;
        $this->cartService = $cartService;
    }

    public function getIndex()
    {
        $products = $this->productService->getAll();

        return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $request,int $id)
    {
        $product = $this->productService->getById($id);
        
        $this->cartService->addProductToCart($product);

        $cart = $this->cartService->getCart();
        
        return redirect()->route('product.index');
    }

    public function getCart()
    {
        $cart = $this->cartService->getCart();

        return view('shop.shopping-cart', ['cart' => $cart]);
    }

    public function getCheckout()
    {
        $total = $this->cartService->getCartTotalPrice();

        return view('shop.checkout', ['total' => $total]);
    }
}
