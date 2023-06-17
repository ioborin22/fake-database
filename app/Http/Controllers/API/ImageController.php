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

        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $images = $images->paginate($limit);
        } else {
            $images = $images->get();
        }

        return response()->json($images);
    }

    /**
     * Display image.
     */
    public function show(string $id)
    {
        $images = Image::findOrFail($id);

        return response()->json($images);
    }
}
