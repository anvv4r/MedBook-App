<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use DateTime;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role_id', 2)->get();
        return view('dashboard.admin.doctor.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $users = Auth::user();

        // $role = Role::where('name', 'admin')->first();
        // // dd($role); // Check if $role is not null (i.e., role exists in the database
        // if (!$role) {
        //     // Handle the error, e.g., return an error message or redirect.
        //     return redirect()->back()->withErrors('Admin role not found.');
        // }
        // $users = User::where('role_id', $role->id)->get();

        return view('dashboard.admin.doctor.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateStore($request); // Ensure validation rules match your input
        $data = $request->all();
        $data['role_id'] = 2;
        $data['image'] = (new User)->userAvatar($request); // Ensure this method works as expected
        $data['password'] = bcrypt($request->password);

        // Debugging
        // dd($data); // Check if $data contains correct information

        User::create($data); // Ensure User model can create a new record

        return redirect()->route('doctor.create')->with('message', 'Doctor created successfully');
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

        // Pass both user and age to the view
        return view('dashboard.admin.doctor.modal', compact('user', 'age'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('dashboard.admin.doctor.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateUpdate($request, $id);
        $data = $request->all();
        $user = User::find($id);
        $imageName = $user->image;
        $userPassword = $user->password;
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
        $user->update($data);
        return redirect()->route('doctor.index')->with('message', 'Doctor updated successfully');
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
        return redirect()->route('doctor.index')->with('message', 'Doctor deleted successfully');
    }

    public function validateStore($request)
    {
        return $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:25',
            'dob' => 'required',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'specialty' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png',
            'description' => 'required'
        ]);
    }
    public function validateUpdate($request, $id)
    {
        return $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'dob' => 'required',
            'gender' => 'required',
            'education' => 'required',
            'address' => 'required',
            'specialty' => 'required',
            'phone_number' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png',
            'description' => 'required'
        ]);
    }

    public function delete(string $id)
    {
        $user = User::find($id);
        return view('dashboard.admin.doctor.delete', compact('user'));

    }

}
