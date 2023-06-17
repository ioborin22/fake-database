<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display comments.
     */
    public function index(Request $request)
    {
        $comments = Comment::query();

        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $comments = $comments->paginate($limit);
        } else {
            $comments = $comments->get();
        }

        return response()->json($comments);
    }

    /**
     * Display comment.
     */
    public function show(string $id)
    {
        $comments = Comment::findOrFail($id);

        return response()->json($comments);
    }
}
