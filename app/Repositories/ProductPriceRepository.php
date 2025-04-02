<?php

namespace App\Repositories;

use App\Models\ProductPrice;
use App\Repositories\Interfaces\ProductPriceRepositoryInterface;

class ProductPriceRepository implements ProductPriceRepositoryInterface
{
    public function getByProductId(int $productId)
    {
        return ProductPrice::where('product_id', $productId)->get();
    }

    public function create(array $data)
    {
        return ProductPrice::create($data);
    }
}
