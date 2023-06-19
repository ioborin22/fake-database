<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Employer;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EmployerController extends Controller
{
    /**
     * Display employers.
     */
    public function index(Request $request)
    {
        // Retrieve employers directly from the database
        $employers = Employer::leftJoin('images', 'employers.id', '=', 'images.employer_id')
            ->select('employers.*', 'images.image_name', 'images.image_url')
            ->get();

        // Check if pagination parameters are provided
        if ($request->has('limit')) {
            $limit = $request->query('limit');
            $page = $request->query('page', 1);
            $offset = ($page - 1) * $limit;

            // Slice the employers based on the pagination parameters
            $total = $employers->count();
            $items = $employers->slice($offset, $limit);

            // Create a new paginator instance
            $employers = new LengthAwarePaginator($items, $total, $limit, $page);
        }

        // Retrieve comments and user details for each employer
        foreach ($employers as $employer) {
            $comments = Comment::where('comments.employer_id', $employer->id)
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->join('user_details', 'users.id', '=', 'user_details.user_id')
                ->select('user_details.user_id', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'users.email', 'comments.rating', 'comments.comment', 'comments.created_at', 'comments.updated_at')
                ->get();

            // Retrieve user details for each employer from user_details table
            $userDetails = UserDetail::where('employer_id', $employer->id)
                ->select('user_details.user_id as employee_id', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'user_details.age', 'user_details.date_of_birth', 'user_details.street_number', 'user_details.unit_number', 'user_details.city', 'user_details.state', 'user_details.zipcode', 'user_details.sex', 'user_details.race_ethnicity', 'user_details.ssn', 'user_details.phone', 'user_details.income')
                ->get();

            // Add comments and user details to the employer object
            $employer['comments'] = $comments;
            $employer['employees'] = $userDetails;
        }

        // Return the employers data as a JSON response
        return response()->json($employers);
    }

    /**
     * Display employer.
     */
    public function show(string $id)
    {
        $employer = Employer::leftJoin('images', 'employers.id', '=', 'images.employer_id')
            ->select('employers.*', 'images.image_url', 'images.image_name')
            ->where('employers.id', $id)
            ->firstOrFail();

        // Retrieve comments for the employer
        $comments = Comment::where('comments.employer_id', $id)
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('user_details.user_id', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'users.email', 'comments.rating', 'comments.comment', 'comments.created_at', 'comments.updated_at')
            ->get();

        // Retrieve users from user_details where employers.id matches user_details.employer_id
        $users = User::join('user_details', 'users.id', '=', 'user_details.user_id')
            ->where('user_details.employer_id', $employer->id)
            ->select('user_details.user_id as employee_id', 'user_details.first_name', 'user_details.middle_name', 'user_details.last_name', 'user_details.age', 'user_details.date_of_birth', 'user_details.street_number', 'user_details.unit_number', 'user_details.city', 'user_details.state', 'user_details.zipcode', 'user_details.sex', 'user_details.race_ethnicity', 'user_details.ssn', 'user_details.phone', 'user_details.income')
            ->get();

        // Add comments and users to the employer object
        $employer['comments'] = $comments;
        $employer['employees'] = $users;

        // Return the employer data as a JSON response
        return response()->json($employer);
    }
}
