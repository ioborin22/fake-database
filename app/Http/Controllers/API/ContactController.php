<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display all user contacts by user ID.
     */
    public function index(string $id, Request $request)
    {
        $contacts = Contact::where('user_id', $id);

        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $contacts = $contacts->paginate($limit);
        } else {
            $contacts = $contacts->get();
        }

        return response()->json($contacts);
    }


    /**
     * Display user's added contacts.
     */
    public function added(string $id)
    {
        $contacts = Contact::where('contacts.user_id', $id)
            ->where('contacts.relationship', 'added')
            ->join('users', 'contacts.contact_id', '=', 'users.id')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('contacts.contact_id', 'users.nickname', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'users.email_verified_at', 'user_details.online', 'user_details.avatar')
            ->get();

        return response()->json($contacts);
    }



    /**
     * Display user's blocked contacts.
     */
    public function blocked(string $id)
    {
        $contacts = Contact::where('user_id', $id)->where('relationship', 'blocked')->get();

        return response()->json($contacts);
    }
}
