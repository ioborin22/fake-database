<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display users.
     */
    public function index(Request $request)
    {
        $users = User::join('user_details', 'users.id', '=', 'user_details.user_id');

        // Check if a limit parameter is provided
        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $users = $users->paginate($limit);
        } else {
            // Fetch all users if no limit parameter is provided
            $users = $users->get();
        }

        return response()->json($users);
    }

    /**
     * Display user.
     */
    public function show(string $id)
    {
        $user = User::leftJoin('user_details', 'users.id', '=', 'user_details.user_id')
            ->findOrFail($id);

        return response()->json($user);
    }

}
