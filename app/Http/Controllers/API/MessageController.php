<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display messages.
     */
    public function index(string $id, Request $request)
    {
        // Find your contacts by your ID where relationship is 'added'
        $contacts = Contact::where('user_id', $id)
            ->where('relationship', 'added')
            ->pluck('contact_id');

        // Fetch messages where one of the sender_id or receiver_id is your ID
        // and the other ID is one of your contacts
        $messages = Message::where(function ($query) use ($id, $contacts) {
            $query->where('sender_id', $id)
                ->whereIn('receiver_id', $contacts);
        })
            ->orWhere(function ($query) use ($id, $contacts) {
                $query->whereIn('sender_id', $contacts)
                    ->where('receiver_id', $id);
            });

        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $messages = $messages->paginate($limit);
        } else {
            $messages = $messages->get();
        }

        return response()->json($messages);
    }

    /**
     * Display messages.
     */
    public function show($senderId, $receiverId, Request $request)
    {
        // Query for messages where sender_id is $senderId and receiver_id is $receiverId
        // or where sender_id is $receiverId and receiver_id is $senderId
        $messages = Message::where(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $senderId)
                ->where('receiver_id', $receiverId);
        })
            ->orWhere(function ($query) use ($senderId, $receiverId) {
                $query->where('sender_id', $receiverId)
                    ->where('receiver_id', $senderId);
            });

        // Check if the request has a 'limit' parameter
        if ($request->has('limit')) {
            $limit = $request->query('limit');
            // Paginate the messages based on the provided limit
            $messages = $messages->paginate($limit);
        } else {
            // Retrieve all messages
            $messages = $messages->get();
        }

        // Check if the messages collection is empty
        if ($messages->isEmpty()) {
            return response()->json(['message' => 'Message not found'], 404);
        }

        // Return the messages as a JSON response
        return response()->json($messages);
    }
}
