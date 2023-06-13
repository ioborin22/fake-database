<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display all users.
     */
    public function all()
    {
        $users = User::join('user_details', 'users.id', '=', 'user_details.user_id')
            ->get();

        return response()->json($users);
    }


    /**
     * Display 15 users.
     */
    public function users15()
    {
        $users = User::join('user_details', 'users.id', '=', 'user_details.user_id')
            ->paginate();

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
