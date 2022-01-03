<?php

namespace App\Repositories\Mysql\Eloquent\Product;

use App\Models\Product;

interface ProductInterface
{

    public static function findById(int $id): ?Product;
    public function create(array $data): ?Product;
    public function update(int $id,array $data): ?Product;
    public function delete(int $id): bool;
}
