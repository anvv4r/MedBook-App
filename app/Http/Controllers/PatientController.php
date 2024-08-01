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

        $doctorId = auth()->id();

        // filter bookings by date
        if ($request->date) {
            $bookings = Booking::latest()->where('date', $request->date)
                ->where('doctor_id', $doctorId)
                ->paginate(10);
            $users = User::where('role_id', 3)->get();

            return view('dashboard.doctor.patient.booking-list', compact('bookings', 'users'));
        }

        $bookings = Booking::where('doctor_id', auth()->user()->id)->with('user')->paginate(10);
        $users = User::where('role_id', 3)->get();

        return view('dashboard.doctor.patient.booking-list', compact('bookings', 'users'));
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

            return redirect()->back()->withErrors('User not found or date of birth not set.');
        }
        $doctorBookings = Booking::where('user_id', $id)
            ->where('doctor_id', auth()->user()->id)
            ->where('status', 1)
            ->get();

        return view('dashboard.doctor.patient.show', compact('user', 'age', 'doctorBookings'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function profile(string $id)
    {
        $user = User::find($id);

        return view('dashboard.admin.patient.profile', compact('user'));
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
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $userPassword;
        }
        $user->update($data);

        return redirect()->route('patient.patient-list')->with('message', 'Profile updated successfully');
        // return redirect()->back()->with('message', 'Profile updated successfully');
    }

    public function profilePic(Request $request, string $id)
    {
        $this->validate($request, ['file' => 'required|image|mimes:jpeg,jpg,png']);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('/images');

            if ($image->move($destination, $name)) {
                $user = User::find($id);

                if ($user) {
                    $user->update(['image' => $name]);
                    return redirect()->back()->with('message', 'Profile image updated');
                } else {
                    return redirect()->back()->with('error', 'User not found');
                }
            } else {
                return redirect()->back()->with('error', 'Failed to upload image');
            }
        } else {
            return redirect()->back()->with('error', 'No file provided');
        }
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
            'phone_number' => 'required|numeric',
        ]);
    }
    public function patientList()
    {
        $users = User::where('role_id', 3)->get();
        return view('dashboard.admin.patient.patient-list', compact('users'));
    }
    public function detail(string $id)
    {
        $user = User::find($id);
        if ($user && $user->dob) {
            $dob = new DateTime($user->dob);
            $now = new DateTime();
            $age = $now->diff($dob)->y;
        } else {
            $age = null;
            return redirect()->back()->withErrors('User not found or date of birth not set.');
        }
        $bookings = Booking::where('user_id', $id)
            ->where('status', 1)
            ->get();

        return view('dashboard.admin.patient.detail', compact('user', 'age', 'bookings'));
    }
}