<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductService {
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts() {
        return $this->productRepository->getAll();
    }

    public function getProductById(int $id) {
        return $this->productRepository->getById($id);
    }

    public function createProduct(array $data) {
        return $this->productRepository->create($data);
    }

    public function updateProduct(int $id, array $data) {
        return $this->productRepository->update($id, $data);
    }

    public function deleteProduct(int $id) {
        return $this->productRepository->delete($id);
    }
}
