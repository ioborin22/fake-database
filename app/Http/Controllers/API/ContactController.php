<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display contacts.
     */
    public function index(Request $request)
    {
        $contacts = Contact::query();

        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $contacts = $contacts->paginate($limit);
        } else {
            $contacts = $contacts->get();
        }

        return response()->json($contacts);
    }

    /**
     * Display contact.
     */
    public function show(string $id)
    {
        $contacts = Contact::findOrFail($id);

        return response()->json($contacts);
    }
}
