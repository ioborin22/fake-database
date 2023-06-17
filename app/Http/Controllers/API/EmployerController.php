<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class EmployerController extends Controller
{
    /**
     * Display employers.
     */
    public function index(Request $request)
    {
        // Cache key for storing the employers data
        $cacheKey = 'employers';

        // Retrieve employers from cache or query the database
        $employers = Cache::remember($cacheKey, 3600, function () {
            return Employer::leftJoin('images', 'employers.id', '=', 'images.employer_id')
                ->select('employers.*', 'images.image_name', 'images.image_url')
                ->get();
        });

        // Check if pagination parameters are provided
        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $page = $request->query('page', 1);
            $offset = ($page - 1) * $limit;

            // Slice the employers based on the pagination parameters
            $total = $employers->count();
            $items = $employers->slice($offset, $limit);

            // Create a new paginator instance
            $employers = new LengthAwarePaginator($items, $total, $limit, $page);
        }

        // Retrieve comments for each employer
        foreach ($employers as $employer) {
            $comments = Comment::where('comments.employer_id', $employer->id)
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->join('user_details', 'users.id', '=', 'user_details.user_id')
                ->select('user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'users.email', 'comments.rating', 'comments.comment', 'comments.created_at', 'comments.updated_at')
                ->get();

            // Add comments to the employer object
            $employer['comments'] = $comments;
        }

        // Return the employers data as a JSON response
        return response()->json($employers);
    }

    /**
     * Display employer.
     */
    public function show(string $id)
    {
        // Cache key for storing the employer data
        $cacheKey = 'employer_' . $id;

        // Retrieve the employer from cache or query the database
        $employer = Cache::remember($cacheKey, 3600, function () use ($id) {
            return Employer::leftJoin('images', 'employers.id', '=', 'images.employer_id')
                ->select('employers.*', 'images.image_url', 'images.image_name')
                ->where('employers.id', $id)
                ->firstOrFail();
        });

        // Retrieve comments for the employer
        $comments = Comment::where('comments.employer_id', $id)
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'users.email', 'comments.rating', 'comments.comment', 'comments.created_at', 'comments.updated_at')
            ->get();

        // Add comments to the employer object
        $employer['comments'] = $comments;

        // Return the employer data as a JSON response
        return response()->json($employer);
    }
}
