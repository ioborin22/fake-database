<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display messages.
     */
    public function index(Request $request)
    {
        $messages = Message::query();

        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $messages = $messages->paginate($limit);
        } else {
            $messages = $messages->get();
        }

        return response()->json($messages);
    }

    /**
     * Display massage.
     */
    public function show(string $id)
    {
        $messages = Message::findOrFail($id);

        return response()->json($messages);
    }
}
