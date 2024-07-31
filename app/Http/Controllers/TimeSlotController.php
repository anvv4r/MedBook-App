<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loggedInUserId = Auth::id();

        $users = User::all();
        $doctor = User::where('id', $loggedInUserId)->first();

        $timeslots = TimeSlot::latest()->where('doc_id', $loggedInUserId)->get();

        // Selecting unique dates for the authenticated doctor's time slots
        $uniqueDates = TimeSlot::select('date')
            ->where('doc_id', $loggedInUserId)
            ->groupBy('date')
            ->pluck('date');

        return view('dashboard.doctor.time.index', compact('loggedInUserId', 'uniqueDates', 'users', 'timeslots', 'doctor'));
    }
    /**
     * Display doctor time slot.
     */
    public function show(Request $request, $date)
    {

        $doctor = User::where('id', auth()->user()->id)->first();

        $timeId = TimeSlot::where('date', $date)->where('doc_id', auth()->user()->id)->first();

        if (!$timeId) {
            return redirect()->to('/doctor/time')->with('errmessage', 'Time slot not available for this date');
        }

        $times = TimeSlot::where('date', $date)
            ->where('doc_id', auth()->user()->id)
            ->get();

        return view('dashboard.doctor.time.show', compact('timeId', 'doctor', 'times', 'date'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role_id', 2)->get();
        return view('dashboard.doctor.time.create', compact('users'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'date' => 'required|unique:time_slots,date,NULL,id,doc_id,' . \Auth::id(),
            'time' => 'required'
        ]);
        foreach ($request->time as $time) {
            TimeSlot::create([
                'doc_id' => auth()->user()->id,
                'date' => $request->date,
                'time' => $time,
                'status' => 0
            ]);
        }
        return redirect()->back()->with('message', 'Time Slot created for' . $request->date);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $time = TimeSlot::find($id);

        return view('dashboard.doctor.time.edit', compact('time'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $date)
    {
        $this->validate($request, [
            'time' => 'required|array',
            'time.*' => 'required'
        ]);

        // dd($request->all());

        // Delete all existing time slots for this date and doctor to replace with new ones
        TimeSlot::where('date', $date)
            ->where('doc_id', auth()->user()->id)
            ->delete();

        // Create a new time slot for each time value in the request
        foreach ($request->time as $time) {
            TimeSlot::create([
                'doc_id' => auth()->user()->id,
                'date' => $date,
                'time' => $time,
                'status' => 0
            ]);
        }
        return redirect()->back()->with('message', 'Time Slot updated for' . $request->date);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $date)
    {
        TimeSlot::where('date', $date)
            ->where('doc_id', auth()->user()->id)
            ->delete();

        return redirect()->back()->with('message', 'Time Slot deleted successfully');
    }
}