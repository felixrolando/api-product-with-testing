<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Product\FindProductService;
use App\Services\Product\GetProductService;
use App\Services\Product\CreateProductService;
use App\Services\Product\UpdateProductService;
use App\Services\Product\DeleteProductService;

class ProductsController extends Controller
{
    private $createProductService;
    private $getProductService;
    private $updateProductService;
    private $findProductService;
    private $deleteProductService;

    public function __construct(CreateProductService $createProductService, UpdateProductService $updateProductService, FindProductService $findProductService, DeleteProductService $deleteProductService, GetProductService $getProductService)
    {
        $this->createProductService = $createProductService;
        $this->getProductService = $getProductService;
        $this->updateProductService = $updateProductService;
        $this->findProductService = $findProductService;
        $this->deleteProductService = $deleteProductService;
    }

    public function index()
    {
        return $this->successResponse($this->getProductService->execute());
    }

    public function show(int $id)
    {
        try {
            $product = $this->findProductService->execute($id);
            if ($product) {

                return $this->successResponse($product);
            }
            return $this->errorResponse('product not found!', 404);
        } catch (\Exception $e) {
            return $this->errorResponse('product not found!', 400);
        }
    }

    public function store(Request $request)
    {
        try {

            $product = $this->createProductService->execute($request->all());
            if ($product) {

                return $this->successResponse($product, null, 201);
            }
            return $this->errorResponse('product not created!', 404);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }

    public function update(int $id, Request $request)
    {
        try {

            $product = $this->updateProductService->execute($id, $request->all());
            if ($product) {

                return $this->successResponse($product);
            }
            return $this->errorResponse('product not updated!', 404);
        } catch (\Exception $e) {

            return $this->errorResponse($e->getMessage(), 400);
        }
    }

    public function destroy(int $id)
    {

        try {
            $product = $this->deleteProductService->execute($id);
            if ($product) {

                return $this->successResponse($product, 'product removed successfully');
            }
            return $this->errorResponse('product not removed!', 404);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 400);
        }
    }
}
