<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::get();

        return view('index')->with(compact("index"));
    }

    public function registerProduct(RegisterProductRequest $request){
        $productData = $request->all();
        Product::create($productData);

        return redirect()->route('index');
    }
}
