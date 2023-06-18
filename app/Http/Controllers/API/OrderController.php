<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display orders.
     */
    public function index(Request $request)
    {
        // Start the query builder and join the 'products' table
        $orders = Order::query()
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'products.name', 'products.brand', 'products.price');

        // Check if the request has a 'limit' parameter
        if ($request->has('limit')) {
            $limit = $request->query('limit');
            // Paginate the results if 'limit' is specified
            $orders = $orders->paginate($limit);
        } else {
            // Get all the results if 'limit' is not specified
            $orders = $orders->get();
        }

        // Return the JSON response with the orders
        return response()->json($orders);
    }

    /**
     * Display order.
     */
    public function show(Request $request, string $userId)
    {
        // Start the query builder and join the 'products' table
        $orders = Order::where('user_id', $userId)
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'products.name', 'products.brand', 'products.price');

        // Check if the request has a 'limit' parameter
        if ($request->has('limit')) {
            $limit = $request->query('limit');
            // Paginate the results if 'limit' is specified
            $orders = $orders->paginate($limit);
        } else {
            // Get all the results if 'limit' is not specified
            $orders = $orders->get();
        }

        // Return the JSON response with the orders
        return response()->json($orders);
    }
}
