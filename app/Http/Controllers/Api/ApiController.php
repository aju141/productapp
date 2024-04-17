<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Apply category filter if provided in the request
        if ($request->has('category')) {
            $query->where('product_cat', $request->category);
        }

        // Paginate the results
        $products = $query->paginate(10);

        // Append the full image URL to each product
        $products->getCollection()->transform(function ($product) {
            $product->image_url = asset('Product-images/' . $product->image_path);
            return $product;
        });

        return response()->json($products);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
