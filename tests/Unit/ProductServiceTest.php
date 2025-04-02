<?php

namespace Tests\Unit;

use Mockery;
use App\Services\ProductService;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    public function test_create_product()
    {
        $mockProductRepository = Mockery::mock(ProductRepositoryInterface::class);
        $mockProductRepository->shouldReceive('create')
            ->once()
            ->andReturnUsing(function ($data) {
                return (object) $data;
            });

        $productService = new ProductService($mockProductRepository);

        $data = [
            'name' => 'Laptop',
            'description' => 'Laptop de última generación',
            'price' => 1200.5,
            'tax_cost' => 15,
            'manufacturing_cost' => 800,
            'currency_id' => 1,
        ];

        $product = $productService->createProduct($data);

        $this->assertEquals('Laptop', $product->name);
        $this->assertEquals(1200.5, $product->price);
    }
}
