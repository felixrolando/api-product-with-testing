<?php

namespace App\Repositories\Mysql\Eloquent\Product;

use App\Models\Product;
use App\Repositories\Mysql\Eloquent\Product\ProductInterface;

final class ProductRepository implements ProductInterface
{

    public static function findById(int $id): ?Product
    {
        return Product::find($id);
    }
    public function create(array $data): ?Product
    {
        return Product::create($data);
    }
    public function update(int $id, array $data): ?Product
    {
        $product = self::findById($id);
        if (!$product) return null;

        $product->product_name = $data['name'];
        $product->product_description = $data['description'];
        $product->save();
    }
    public function delete(int $id): bool
    {
        return self::findById($id)->delete();
    }
}
