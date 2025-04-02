<?php

namespace Tests\Feature;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Test para verificar que un producto se guarda correctamente.
     *
     * @return void
     */
    public function test_create_product()
    {

        $product = Product::factory()->create();

        $this->assertDatabaseHas('products', [
            'name' => $product->name,
            'price' => $product->price,
        ]);
    }

    /**
     * Test para verificar la creación de múltiples productos.
     *
     * @return void
     */
    public function test_create_multiple_products()
    {

        $products = Product::factory()->count(5)->create();

        foreach ($products as $product) {
            $this->assertDatabaseHas('products', [
                'name' => $product->name,
                'price' => $product->price,
            ]);
        }
    }
}
