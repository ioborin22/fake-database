<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display images.
     */
    public function index(Request $request)
    {
        $images = Image::query();

        // Check if the 'limit' parameter is present in the request
        if ($request->has('limit')) {
            $limit = $request->query('limit');

            // Retrieve paginated results with the specified limit
            $images = $images->whereNotNull('employer_id')
                ->orWhereNotNull('post_id')
                ->orWhereNotNull('product_id')
                ->select(['id', 'image_name', 'image_url', 'created_at', 'updated_at'])
                ->paginate($limit);
        } else {
            // Retrieve all results without pagination
            $images = $images->orWhereNotNull('employer_id')
                ->orWhereNotNull('post_id')
                ->orWhereNotNull('product_id')
                ->get(['id', 'image_name', 'image_url', 'created_at', 'updated_at']);
        }

        return response()->json($images);
    }

    /**
     * Display image.
     */
    public function show(string $id)
    {
        // Select specific columns for the image query
        $image = Image::select('id', 'image_name', 'image_url', 'created_at', 'updated_at')
            ->findOrFail($id);

        // Return the image as a JSON response
        return response()->json($image);
    }
}
