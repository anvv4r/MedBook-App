<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $practitioners = User::where('role_id', 2)
            ->whereHas('timeslots', function ($query) {
                $query->where('status', 0)
                    ->where('date', '>=', Carbon::today());
            })
            ->paginate(6);

        if ($request->ajax()) {
            return view('partials.doctors', compact('practitioners'))->render();
        }
        return view('index', compact('practitioners'));
    }

    public function loadmore(Request $request)
    {
        $practitioners = User::where('role_id', 2)
            ->whereHas('timeslots', function ($query) {
                $query->where('status', 0)
                    ->where('date', '>=', Carbon::today());
            })
            ->paginate(6);

        if ($request->ajax()) {
            return view('partials.doctors', compact('practitioners'))->render();
        }
        return view('index', compact('practitioners'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $practitioners = User::where('role_id', 2)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('education', 'like', '%' . $search . '%')
                    ->orWhere('specialty', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->paginate(6);

        if ($request->ajax()) {
            return view('partials.doctors', compact('practitioners'))->render();
        }
        return view('search', compact('practitioners'));
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
            return redirect()->back()->withErrors('User not found.');
        }

        // Retrieve appointments for the user_id where the date is unique and user_id is the doctor's ID
        $appointments = TimeSlot::select('date')
            ->where('date', '>', Carbon::yesterday())
            ->where('doc_id', $user->id)
            ->groupBy('date')
            ->get();
        $doctorId = $id;
        $doctor = User::find($id);

        return view('booking.doctor', compact('user', 'age', 'appointments', 'doctor', 'doctorId'));
    }
}