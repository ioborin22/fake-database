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
