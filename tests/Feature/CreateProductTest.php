<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Nette\Utils\Random;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
   public function test_an_product_can_be_created():void
   {
        $productData = [
            "name" => "Limpiatrastes",
            "description" => "Jabon liquido especializado para limpiar los trastes",
            "price" => 10,
            "stock" => 6,
            "category_id" => 1,
            "code" => 454879456
        ];
        
        $response = $this->post('/products', $productData);

        $response->assertStatus(302);
        $this->assertDatabaseHas('products', $productData);
   }
}
