<?php

namespace App\Services\Product;

use App\Repositories\Mysql\Eloquent\Product\ProductRepository;

final class UpdateProductService
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function execute(int $id, array $data)
    {

        return $data;

        try {

            $product_update = $this->productRepository->update($id, $data);
            return $product_update;
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }
}
