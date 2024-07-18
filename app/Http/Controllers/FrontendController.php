<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $doctors = User::where('role_id', 2)
            ->whereHas('timeslots', function ($query) {
                $query->where('status', 0);
            })
            ->latest()
            ->take(10)
            ->get();

        return view('index', compact('doctors'));
    }


    public function loadmore(Request $request)
    {
        $search = $request->get('search');
        $doctors = User::where('role_id', 2)
            ->whereHas('timeslots', function ($query) {
                $query->where('status', 0);
            })
            ->paginate(6);

        if ($request->ajax()) {
            return view('partials.doctors', compact('doctors'))->render();
        }

        return view('index', compact('doctors'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $doctors = User::where('role_id', 2)
            ->whereHas('timeslots', function ($query) {
                $query->where('status', 0);
            })
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('education', 'like', '%' . $search . '%')
                    ->orWhere('specialty', 'like', '%' . $search . '%');
            })
            ->paginate(6);

        if ($request->ajax()) {
            return view('partials.doctors', compact('doctors'))->render();
        }

        return view('index', compact('doctors'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the user by ID to calculate age
        $user = User::find($id);
        if ($user && $user->dob) {
            $dob = new DateTime($user->dob);
            $now = new DateTime();
            $age = $now->diff($dob)->y;
        } else {
            $age = null;
            // Handle the error, e.g., return an error message or redirect.
            return redirect()->back()->withErrors('User not found.');
        }

        // Retrieve appointments for the user_id where the date is unique and user_id is the doctor's ID
        $appointments = TimeSlot::select('date')
            ->where('doc_id', $user->id)
            ->groupBy('date')
            ->get();
        $doctorId = $id;
        $doctor = User::find($id);

        // Pass the user, age, and appointments to the view
        return view('booking.doctor', compact('user', 'age', 'appointments', 'doctor', 'doctorId'));
    }



}
