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
        // Start the query builder and join the 'products', 'users', and 'user_details' tables
        $orders = Order::query()
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('orders.*', 'products.name', 'products.brand', 'products.price', 'users.nickname as user_nickname', 'users.email as user_email', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'user_details.age', 'user_details.date_of_birth', 'user_details.street_number', 'user_details.unit_number', 'user_details.city', 'user_details.state', 'user_details.zipcode', 'user_details.sex', 'user_details.phone');

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
        // Start the query builder and join the 'products', 'users', and 'user_details' tables
        $orders = Order::where('orders.user_id', $userId)
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('orders.*', 'products.name', 'products.brand', 'products.price', 'users.nickname as user_nickname', 'users.email as user_email', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'user_details.age', 'user_details.date_of_birth', 'user_details.street_number', 'user_details.unit_number', 'user_details.city', 'user_details.state', 'user_details.zipcode', 'user_details.sex', 'user_details.phone');

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
