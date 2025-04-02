<?php

namespace App\Repositories\Interfaces;

interface ProductPriceRepositoryInterface
{
    public function getByProductId(int $productId);
    public function create(array $data);
}