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
        $orders = Order::query();

        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $orders = $orders->paginate($limit);
        } else {
            $orders = $orders->get();
        }

        return response()->json($orders);
    }

    /**
     * Display order.
     */
    public function show(string $id)
    {
        $orders = Order::findOrFail($id);

        return response()->json($orders);
    }
}
