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

        $comments = Comment::where('employer_id', $id)->pluck('comment')->toArray();

        $employer['comments'] = $comments;

        return response()->json($employer);
    }
}
