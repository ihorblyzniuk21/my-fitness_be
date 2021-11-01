<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        try {
            $products = ProductResource::collection(Product::whereName($request->query('name'))->get());

            return response()->json($products);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Could not get products.',
                'exception' => $ex->getMessage()
            ], 500);
        }
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $validated = $request->validated();
            $request->user()->products()->syncWithoutDetaching($validated['product_ids']);

            return ProductResource::collection($request->user()->products()->get());
        } catch (\Exception $ex) {
            return response()->json([
                'message' => 'Could not set products.',
                'exception' => $ex->getMessage()
            ], 500);
        }
    }
}
