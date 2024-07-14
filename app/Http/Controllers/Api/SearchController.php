<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Timeslot;

class SearchController extends Controller
{
    public function index()
    {
        $availableDoctors = User::where('role_id', 2) // Consider replacing 2 with a constant or config value
            ->whereHas('timeslots')
            ->with('timeslots') // Eager load timeslots if they're used in the view
            ->paginate(6); // Use pagination to manage large datasets

        // Assuming this is for an API, return a JSON response
        return response()->json($availableDoctors);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $doctors = User::where('role_id', 2)
            ->whereHas('timeslots', function ($query) {
                $query->where('status', 0);
            })
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%')
            ->orWhere('education', 'like', '%' . $search . '%')
            ->orWhere('specialty', 'like', '%' . $search . '%')
            ->paginate(6); // Use pagination to manage large datasets

        return response()->json($doctors);
    }

}
