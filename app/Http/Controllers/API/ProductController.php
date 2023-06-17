<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Check if caching is enabled
        $useCache = $request->query('cache', false);

        if ($useCache) {
            // Cache key for storing the products data
            $cacheKey = 'products';

            // Retrieve products from cache or query the database
            $products = Cache::remember($cacheKey, 3600, function () {
                return Product::leftJoin('images', 'products.id', '=', 'images.product_id')
                    ->select('products.*', 'images.image_name', 'images.image_url')
                    ->get();
            });
        } else {
            // Retrieve products directly from the database
            $products = Product::leftJoin('images', 'products.id', '=', 'images.product_id')
                ->select('products.*', 'images.image_name', 'images.image_url')
                ->get();
        }

        // Check if pagination parameters are provided
        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $page = $request->query('page', 1);
            $offset = ($page - 1) * $limit;

            // Slice the products based on the pagination parameters
            $total = $products->count();
            $items = $products->slice($offset, $limit);

            // Create a new paginator instance
            $products = new LengthAwarePaginator($items, $total, $limit, $page);
        }

        // Retrieve comments for each product
        foreach ($products as $product) {
            $comments = Comment::where('comments.product_id', $product->id)
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->join('user_details', 'users.id', '=', 'user_details.user_id')
                ->select('user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'users.email', 'comments.rating', 'comments.comment', 'comments.created_at', 'comments.updated_at')
                ->get();

            // Add comments to the product object
            $product['comments'] = $comments;
        }

        // Return the products data as a JSON response
        return response()->json($products);
    }


    /**
     * Display product.
     */
    public function show(string $id, Request $request)
    {
        // Check if caching is enabled
        $useCache = $request->query('cache', false);

        // Cache key for storing the product data
        $cacheKey = 'product_' . $id;

        if ($useCache) {
            // Retrieve the product from cache or query the database
            $product = Cache::remember($cacheKey, 3600, function () use ($id) {
                return Product::leftJoin('images', 'products.id', '=', 'images.product_id')
                    ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*', 'images.image_url', 'images.image_name', 'categories.name AS category_name')
                    ->where('products.id', $id)
                    ->firstOrFail();
            });
        } else {
            // Retrieve the product directly from the database
            $product = Product::leftJoin('images', 'products.id', '=', 'images.product_id')
                ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'images.image_url', 'images.image_name', 'categories.name AS category_name')
                ->where('products.id', $id)
                ->firstOrFail();
        }

        // Retrieve comments for the product
        $comments = Comment::where('comments.product_id', $id)
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'users.email', 'comments.rating', 'comments.comment', 'comments.created_at', 'comments.updated_at')
            ->get();

        // Add comments to the product object
        $product['comments'] = $comments;

        // Return the product data as a JSON response
        return response()->json($product);
    }


}
