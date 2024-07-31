<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\SendBookingDetails;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id, $date)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('home.doctor', ['id' => $id])->with('error', 'Please register / login as a Patient to make an appointment!');
        }

        $times = TimeSlot::where('status', 0)
            ->where('doc_id', $id)
            ->where('date', '>', Carbon::today())
            ->get();

        $appointments = TimeSlot::where('doc_id', $id)
            ->where('date', $date)
            ->get();

        $appointment = $appointments->first();
        $doctorName = User::where('id', $id)->first()->name;
        $doctorId = $id;

        return view('booking.index', compact('user', 'times', 'appointments', 'appointment', 'doctorName', 'date', 'id', 'doctorId'));
    }
    /**
     * Show the confirmation page.
     */
    public function confirm(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'time' => 'required'
        ]);

        // Check for pending appointments
        if ($this->checkBookingStatus($request)) {
            return redirect()->back()->with('message', 'You still have a pending appointment for this practitioner. Please wait to make the next appointment.');
        }

        // Check for existing appointments at the same date and time
        if ($this->checkBookingDateTimeStatus($request)) {
            return redirect()->back()->with('message', 'You already have an appointment for this date and time. Please select another date and time.');
        }

        // Get the booking data
        $bookingData = $request->all();
        $doctorId = $bookingData['doctor_id'];
        $doctorData = User::find($doctorId);
        $user = Auth::user();

        // Pass the booking data to the confirmation view
        return view('booking.confirm', compact('bookingData', 'doctorData', 'user', 'doctorId'));
    }

    public function checkBookingStatus(Request $request)
    {
        $doctorId = $request->input('doctor_id');
        return Booking::orderby('id', 'desc')
            ->where('user_id', auth()->user()->id)
            ->where('doctor_id', $doctorId)
            ->where('status', 0)
            ->exists();
    }

    public function checkBookingDateTimeStatus(Request $request)
    {
        $date = $request->input('date');
        $time = $request->input('time');
        return Booking::orderby('id', 'desc')
            ->where('user_id', auth()->user()->id)
            ->where('date', $date)
            ->where('time', $time)
            ->where('status', 0)
            ->exists();
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
        $time_slot = TimeSlot::where('doc_id', $doctorId)
            ->where('time', $time)
            ->where('date', $date)
            ->first();
        // dd($time_slot, $time, $date);
        $time_slot->status = 1;
        $time_slot->save();

        //send email notification
        // $user = auth()->user(); // Get the authenticated user
        // $doctor = User::find($doctorId); // fetches the doctor's information

        // $mailData = [
        //     'name' => $user->name,
        //     'time' => $time,
        //     'date' => $date,
        //     'doctorName' => $doctor ? $doctor->name : 'Doctor',
        //     'doctorAddress' => $doctor ? $doctor->address : 'Not available'
        // ];

        // try {
        //     \Mail::to($user->email)->send(new SendBookingDetails($mailData));
        // } catch (\Exception $e) {
        //     return redirect()->route('home.doctor', ['id' => $doctorId])->with('error', 'Failed to send email notification!');
        // }

        return redirect()->route('home.doctor', ['id' => $doctorId])->with('success', 'Appointment booked successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function myBookings()
    {
        $bookings = Booking::latest()
            ->where('user_id', auth()->user()->id)
            ->paginate(10);


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