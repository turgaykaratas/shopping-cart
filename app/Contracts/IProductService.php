<?php

namespace App\Contracts;

use App\Product;

interface IProductService
{
    public function getAll();
    public function getById(int $id): Product;
}