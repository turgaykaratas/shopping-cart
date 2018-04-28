<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Cache;
use App\Contracts\IProductService;
use App\Product;

class ProductService implements IProductService
{
    private $products;

    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }

    public function getAll()
    {
        $products = Cache::remember('products', 1, function () {
            return $this->products->all();
        });

        return $products;
    }

    public function getById(int $id): Product
    {
        $product = $this->products->find($id);

        return $product;
    }
}