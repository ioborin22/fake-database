<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display posts.
     */
    public function index(Request $request)
    {
        $posts = Post::query();

        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $posts = $posts->paginate($limit);
        } else {
            $posts = $posts->get();
        }

        return response()->json($posts);
    }
    /**
     * Display post.
     */
    public function show(string $id)
    {
        $posts = Post::findOrFail($id);

        return response()->json($posts);
    }
}
