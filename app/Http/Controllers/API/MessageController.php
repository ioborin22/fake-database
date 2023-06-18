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
    public function index(string $id, Request $request)
    {
        $messages = Message::where('sender_id', $id);

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
    public function show($senderId, $receiverId, Request $request)
    {
        $messages = Message::where('sender_id', $senderId)
            ->where('receiver_id', $receiverId);

        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $messages = $messages->paginate($limit);
        } else {
            $messages = $messages->get();
        }

        if ($messages->isEmpty()) {
            return response()->json(['message' => 'Message not found'], 404);
        }

        return response()->json($messages);
    }


}
