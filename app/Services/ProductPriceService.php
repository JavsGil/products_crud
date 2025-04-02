<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductPriceRepositoryInterface;

class ProductPriceService
{
    protected $productPriceRepository;

    public function __construct(ProductPriceRepositoryInterface $productPriceRepository)
    {
        $this->productPriceRepository = $productPriceRepository;
    }

    public function getPricesByProduct(int $productId)
    {
        return $this->productPriceRepository->getByProductId($productId);
    }

    public function addPriceToProduct(array $data)
    {
        return $this->productPriceRepository->create($data);
    }
}
