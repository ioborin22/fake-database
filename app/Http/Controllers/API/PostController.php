<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display posts.
     */
    public function index(Request $request)
    {
        // Retrieve posts directly from the database
        $posts = Post::leftJoin('images', 'posts.id', '=', 'images.post_id')
            ->select('posts.*', 'images.image_name', 'images.image_url')
            ->get();

        // Check if pagination parameters are provided
        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $page = $request->query('page', 1);
            $offset = ($page - 1) * $limit;

            // Slice the posts based on the pagination parameters
            $total = $posts->count();
            $items = $posts->slice($offset, $limit);

            // Create a new paginator instance
            $posts = new LengthAwarePaginator($items, $total, $limit, $page);
        }

        // Retrieve comments for each post
        foreach ($posts as $post) {
            $comments = Comment::where('comments.post_id', $post->id)
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->join('user_details', 'users.id', '=', 'user_details.user_id')
                ->select('user_details.user_id', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'users.email', 'comments.comment', 'comments.created_at', 'comments.updated_at')
                ->get();

            // Add comments to the post object
            $post['comments'] = $comments;
        }

        // Return the posts data as a JSON response
        return response()->json($posts);
    }

    /**
     * Display a post with comments.
     */
    public function show(string $id)
    {
        // Retrieve the post directly from the database
        $post = Post::leftJoin('images', 'posts.id', '=', 'images.post_id')
            ->select('posts.*', 'images.image_url', 'images.image_name')
            ->where('posts.id', $id)
            ->firstOrFail();

        // Retrieve comments for the post
        $comments = Comment::where('comments.post_id', $id)
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('user_details.user_id', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'users.email', 'comments.rating', 'comments.comment', 'comments.created_at', 'comments.updated_at')
            ->get();

        // Add comments to the post object
        $post['comments'] = $comments;

        // Return the post data as a JSON response
        return response()->json($post);
    }

}
