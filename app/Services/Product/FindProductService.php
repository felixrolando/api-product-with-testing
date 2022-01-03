<?php

namespace App\Services\Product;

use App\Repositories\Mysql\Eloquent\Product\ProductRepository;

final class FindProductService
{

    public function execute(int $id)
    {

        try {


            $product_find = ProductRepository::findById($id);
            return $product_find;
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }
}
