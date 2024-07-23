<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteProductRequest;
use App\Http\Requests\RegisterProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::get();

        return view('index')->with(compact("products"));
    }

    public function registerProduct(RegisterProductRequest $request){
        $productData = $request->all();
        Product::create($productData);

        return redirect()->route('index');
    }

    public function editProduct(UpdateProductRequest $request, $id){

        $product = Product::where('id', $id)->first();

        $validatedData = $request->validated();
        $product->update($validatedData);

        return response()->json($product, 200);
    }

    public function deleteProduct(DeleteProductRequest $request){

        $id = $request->id;
        $product = Product::where('id', $id)->first();
        $product->delete();

        if($product){
            return response()->json(['true', 'Product was deleted']);
        }else{
            return response()->json(['false', 'Product not found']);
        }
    }
}
