<?php

namespace App\Repositories;

use Exception;
use App\Product;
use App\Repositories\Core\Repository;

class ProductRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return Product::class;
    }
}