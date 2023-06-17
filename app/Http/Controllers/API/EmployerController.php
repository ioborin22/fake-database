<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display employers.
     */
    public function index(Request $request)
    {
        $employers = Employer::query();

        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $employers = $employers->paginate($limit);
        } else {
            $employers = $employers->get();
        }

        return response()->json($employers);
    }

    /**
     * Display employer.
     */
    public function show(string $id)
    {
        $employer = Employer::leftJoin('images', 'employers.id', '=', 'images.employer_id')
            ->select('employers.*', 'images.image_url', 'images.image_name')
            ->where('employers.id', $id)
            ->firstOrFail();

        $comments = Comment::where('comments.employer_id', $id)
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'users.email', 'comments.comment')
            ->get();

        $employer['comments'] = $comments;

        return response()->json($employer);
    }
}
