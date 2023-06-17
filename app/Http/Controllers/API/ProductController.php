<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display products.
     */
    public function index(Request $request)
    {
        $products = Product::query();

        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $products = $products->paginate($limit);
        } else {
            $products = $products->get();
        }

        return response()->json($products);
    }

    /**
     * Display product.
     */
    public function show(string $id)
    {
        $products = Product::findOrFail($id);

        return response()->json($products);
    }
}
