<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use DateTime;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bookingList(Request $request)
    {

        $doctorId = auth()->id(); // Get the logged-in doctor's ID

        // filter bookings by date
        if ($request->date) {
            $bookings = Booking::latest()->where('date', $request->date)
                ->where('doctor_id', $doctorId)
                ->paginate(10);
            return view('dashboard.doctor.patient.booking-list', compact('bookings'));
        }

        // Retrieve only bookings that belong to the logged-in doctor
        $bookings = Booking::where('doctor_id', $doctorId)
            ->paginate(10);

        return view('dashboard.doctor.patient.booking-list', compact('bookings'));
    }

    /**
     * Updating Booking status.
     */
    public function toggleStatus($id)
    {
        $booking = Booking::find($id);
        $booking->status = !$booking->status;
        $booking->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if ($user && $user->dob) {
            $dob = new DateTime($user->dob);
            $now = new DateTime();
            $age = $now->diff($dob)->y;
        } else {
            $age = null;
            // Handle the error, e.g., return an error message or redirect.
            return redirect()->back()->withErrors('User not found or date of birth not set.');
        }
        $bookings = Booking::where('user_id', $id)->get();

        // Pass both user and age to the view
        return view('dashboard.admin.patient.modal', compact('user', 'age', 'bookings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('dashboard.admin.patient.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateUpdate($request, $id);
        $data = $request->all();
        $user = User::find($id);
        $userPassword = $user->password;
        $imageName = $user->image;

        if ($request->hasFile('image')) {
            $imageName = (new User)->userAvatar($request);
            unlink(public_path('images/' . $user->image));
        }
        $data['image'] = $imageName;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $userPassword;
        }

        // dd($data); // Check if $data contains correct information

        $user->update($data);
        return redirect()->back()->with('message', 'Patient updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->id == $id) {
            abort(401);
        }
        $user = User::find($id);
        $userDelete = $user->delete();
        if ($userDelete) {
            unlink(public_path('images/' . $user->image));
        }
        return redirect()->route('patient.patient-list')->with('message', 'Patient deleted successfully');
    }

    public function delete(string $id)
    {
        $user = User::find($id);
        return view('dashboard.admin.patient.delete', compact('user'));

    }

    public function validateUpdate($request, $id)
    {
        return $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png',
        ]);
    }
    public function patientList()
    {
        $users = User::where('role_id', 3)->get();

        return view('dashboard.admin.patient.patient-list', compact('users'));
    }
}
