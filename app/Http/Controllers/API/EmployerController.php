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
        $cacheKey = 'employers';

        $employers = Cache::remember($cacheKey, 3600, function () {
            return Employer::leftJoin('images', 'employers.id', '=', 'images.employer_id')
                ->select('employers.*', 'images.image_name', 'images.image_url')
                ->get();
        });

        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $page = $request->query('page', 1);
            $offset = ($page - 1) * $limit;

            $total = $employers->count();
            $items = $employers->slice($offset, $limit);

            $employers = new LengthAwarePaginator($items, $total, $limit, $page);
        }

        foreach ($employers as $employer) {
            $comments = Comment::where('comments.employer_id', $employer->id)
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->join('user_details', 'users.id', '=', 'user_details.user_id')
                ->select('user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'users.email', 'comments.rating', 'comments.comment', 'comments.created_at', 'comments.updated_at')
                ->get();

            $employer['comments'] = $comments;
        }

        return response()->json($employers);
    }


    /**
     * Display employer.
     */
    public function show(string $id)
    {
        $cacheKey = 'employer_' . $id;

        $employer = Cache::remember($cacheKey, 3600, function () use ($id) {
            return Employer::leftJoin('images', 'employers.id', '=', 'images.employer_id')
                ->select('employers.*', 'images.image_url', 'images.image_name')
                ->where('employers.id', $id)
                ->firstOrFail();
        });

        $comments = Comment::where('comments.employer_id', $id)
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'users.email', 'comments.rating', 'comments.comment', 'comments.created_at', 'comments.updated_at')
            ->get();

        $employer['comments'] = $comments;

        return response()->json($employer);
    }
}
