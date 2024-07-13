<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\SendBookingDetails;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, $date)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login to make an appointment!');
        }

        $times = TimeSlot::where('status', 0)
            ->where('doc_id', $id)
            ->where('date', $date)
            ->get();
        $appointments = TimeSlot::where('doc_id', $id)->where('date', $date)->get();
        $doctorName = User::where('id', $id)->first()->name;
        $appointment = $appointments->first();
        $doctorId = $id;

        return view('booking.index', compact('user', 'times', 'appointments', 'appointment', 'doctorName', 'date', 'id', 'doctorId'));
    }


    /**
     * Show the confirmation page.
     */
    public function confirm(Request $request)
    {

        // dd($request->all()); // This will dump all request data

        // Validate the request data if needed
        $validated = $request->validate([
            'doctor_id' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        // $check = $this->checkBookingStatus();
        // if ($check) {
        //     return redirect()->back()->with('message', 'You have already booked an appointment. Please wait to make next appointment');
        // }

        // Get the booking data
        $doctorId = $request->doctor_id;
        $bookingData = $request->all();
        $doctorId = $bookingData['doctor_id'];
        $doctorData = User::where('id', $doctorId)->first();
        $user = Auth::user();

        // Pass the booking data to the confirmation view
        return view('booking.confirm', compact('bookingData', 'doctorData', 'user', 'doctorId'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $doctorId = $request->input('doctor_id');
        $date = $request->input('date');
        $time = $request->input('time');

        // Create a new booking
        $booking = new Booking();
        $booking->user_id = $userId;
        $booking->doctor_id = $doctorId;
        $booking->date = $date;
        $booking->time = $time;
        $booking->status = 0;
        $booking->save();


        // Update the status of the time slot
        TimeSlot::where('doc_id', $doctorId)
            ->where('time', $time)
            ->where('date', $date)
            ->update(['status' => 1]);

        //send email notification
        $doctorName = User::where('id', $doctorId)->first(); // Use $doctorId instead of $request->doctorId
        $mailData = [
            'name' => auth()->user()->name,
            'time' => $request->time,
            'date' => $request->date,
            'doctorName' => $doctorName ? $doctorName->name : 'Doctor' // Add a null check
        ];
        try {
            \Mail::to(auth()->user()->email)->send(new SendBookingDetails($mailData));

        } catch (\Exception $e) {

        }

        return redirect()->route('home.doctor', ['id' => $doctorId])->with('success', 'Appointment booked successfully!');
    }

    public function checkBookingStatus()
    {
        return Booking::orderby('id', 'desc')
            ->where('user_id', auth()->user()->id)
            ->where('status', 0)
            // ->whereDate('created_at', date('Y-m-d'))
            ->exists();
    }
    /**
     * Display the specified resource.
     */
    public function myBookings()
    {
        $bookings = Booking::latest()->where('user_id', auth()->user()->id)->get();
        return view('dashboard.patient.booking.my-booking', compact('bookings'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
