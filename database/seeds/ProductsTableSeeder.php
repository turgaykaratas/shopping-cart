<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51dGPQB3gTL._SX354_BO1,204,203,200_.jpg',
            'title' => 'Harry Potter',
            'description' => 'Super cool - at least as a child',
            'price' => 10
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51dGPQB3gTL._SX354_BO1,204,203,200_.jpg',
            'title' => 'Harry Potter 2',
            'description' => 'Super cool 2 - at least as a child',
            'price' => 20
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51dGPQB3gTL._SX354_BO1,204,203,200_.jpg',
            'title' => 'Harry Potter 3',
            'description' => 'Super cool 3 - at least as a child',
            'price' => 30
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51dGPQB3gTL._SX354_BO1,204,203,200_.jpg',
            'title' => 'Harry Potter 4',
            'description' => 'Super cool 4 - at least as a child',
            'price' => 40
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51dGPQB3gTL._SX354_BO1,204,203,200_.jpg',
            'title' => 'Harry Potter 5',
            'description' => 'Super cool 5 - at least as a child',
            'price' => 50
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51dGPQB3gTL._SX354_BO1,204,203,200_.jpg',
            'title' => 'Harry Potter 6',
            'description' => 'Super cool 6 - at least as a child',
            'price' => 60
        ]);
        $product->save();
    }
}
