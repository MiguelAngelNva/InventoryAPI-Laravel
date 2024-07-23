<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class DeleteProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function a_product_can_be_deleted(): void
    {
        $productData = [
            "name" => "Limpiatrastes",
            "description" => "Jabon liquido especializado para limpiar los trastes",
            "price" => 10,
            "stock" => 6,
            "category_id" => 1,
            "code" => 454879456
        ];

        $product = Product::create($productData);
        $id = $product->id;

        $response = $this->post('/deleteProduct/{id}');
    }

}
