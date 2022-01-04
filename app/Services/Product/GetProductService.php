<?php

namespace App\Services\Product;

use App\Repositories\Mysql\Eloquent\Product\ProductRepository;

final class GetProductService
{

    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    public function execute()
    {
        return $this->productRepository->get();
    }
}
