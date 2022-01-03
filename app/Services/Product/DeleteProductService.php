<?php

namespace App\Services\Product;

use App\Repositories\Mysql\Eloquent\Product\ProductRepository;

final class DeleteProductService
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function execute(int $id)
    {

        try {


            $product_delete = $this->productRepository->delete($id);
            return $product_delete;
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }
}
