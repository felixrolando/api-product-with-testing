<?php

namespace App\Services\Product;

use App\Repositories\Mysql\Eloquent\Product\ProductRepository;

final class CreateProductService
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function execute(array $data)
    {

        try {

            $product =  array(
                "product_name" => $data['name'],
                "product_description" => $data['description']
            );

            $product_new = $this->productRepository->create($product);
            return $product_new;
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }
}
