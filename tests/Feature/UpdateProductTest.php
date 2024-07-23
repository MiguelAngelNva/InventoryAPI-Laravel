<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as TestingTestCase;
use Illuminate\Foundation\Testing\WithFaker;

class UpdateProductTest extends TestingTestCase
{
    protected $product;

    public function setUp(): void
    {
        parent::setUp();

        $this->product = Product::create([
            'name' => 'Toallas humedas',
            'description' => 'Toallas higienicas',
            'price' => 15,
            'stock' => 12,
            'category_id' => 1,
            'code' => 465879854
        ]);
    } 

    public function test_a_product_can_be_updated(): void
    {
        $updateData = [
            'name' => 'Jabon Lavaplatos'
        ];

        $response = $this->put('/products/'. $this->product->id, $updateData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('products', $updateData);
    }
}
