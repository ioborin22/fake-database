<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * Display users.
     */
    public function index(Request $request)
    {
        $cacheEnabled = $request->query('cache', false) === 'true'; // Check if caching is enabled
        $cacheKey = 'users_index';
        $cacheDuration = 60; // Cache duration in minutes

        if ($cacheEnabled) {
            $users = Cache::get($cacheKey);
        } else {
            $users = null;
        }

        if (!$users) {
            // Build the query to fetch users
            $query = User::join('user_details', 'users.id', '=', 'user_details.user_id')
                ->select('users.id', 'users.nickname', 'users.email', 'users.email_verified_at', 'users.created_at', 'users.updated_at', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'user_details.age', 'user_details.date_of_birth', 'user_details.street_number', 'user_details.unit_number', 'user_details.city', 'user_details.state', 'user_details.zipcode', 'user_details.relation_to_household_head', 'user_details.sex', 'user_details.race_ethnicity', 'user_details.ssn', 'user_details.employer_id', 'user_details.employer_name', 'user_details.income', 'user_details.avatar', 'user_details.online');

            if ($request->has('limit')) {
                $limit = $request->query('limit');
                $users = $query->paginate($limit); // Paginate the results
            } else {
                $users = $query->get(); // Fetch all users
            }

            if ($cacheEnabled) {
                Cache::put($cacheKey, $users, $cacheDuration); // Cache the users
            }
        } else {
            if ($request->has('limit')) {
                $limit = $request->query('limit');
                $page = $request->query('page', 1);
                $offset = ($page - 1) * $limit;

                $total = $users->count();
                $items = $users->slice($offset, $limit);

                $users = new LengthAwarePaginator($items, $total, $limit, $page); // Create a custom paginator
            }
        }

        return response()->json($users);
    }

    /**
     * Display user.
     */
    public function show(string $id)
    {
        $cacheEnabled = request()->query('cache', false) === 'true'; // Check if caching is enabled
        $cacheKey = 'user_' . $id;
        $cacheDuration = 60; // Cache duration in minutes

        if ($cacheEnabled) {
            $user = Cache::get($cacheKey); // Check if user exists in cache
        } else {
            $user = null;
        }

        if (!$user) {
            // Fetch the user from the database if not found in cache
            $user = User::leftJoin('user_details', 'users.id', '=', 'user_details.user_id')
                ->select('users.id', 'users.nickname', 'users.email', 'users.email_verified_at', 'users.created_at', 'users.updated_at', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'user_details.age', 'user_details.date_of_birth', 'user_details.street_number', 'user_details.unit_number', 'user_details.city', 'user_details.state', 'user_details.zipcode', 'user_details.relation_to_household_head', 'user_details.sex', 'user_details.race_ethnicity', 'user_details.ssn', 'user_details.employer_id', 'user_details.employer_name', 'user_details.income', 'user_details.avatar', 'user_details.online')
                ->findOrFail($id);

            if ($cacheEnabled) {
                Cache::put($cacheKey, $user, $cacheDuration); // Cache the user
            }
        }

        return response()->json($user);
    }
}
