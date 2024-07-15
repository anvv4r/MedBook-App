<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Specialty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DocRegController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialties = Specialty::all(); // Assuming you have a Specialty model
        return view('auth.register-doctor', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeDoctor(Request $request)
    {
        // Ensure validation rules match your input
        $this->validateStore($request);

        // Assuming validation is done, proceed to gather data
        $data = $request->all();
        $data['role_id'] = Role::where('name', 'doctor')->first()->id; // Ensure the role exists
        $data['image'] = (new User)->userAvatar($request); // Ensure this method works as expected and returns a path or identifier for the image
        $data['password'] = Hash::make($request->password);

        // Create the user
        $user = User::create($data);

        // Log in the newly created user
        Auth::login($user);

        return redirect('/dashboard')->with('message', 'Doctor created successfully');
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
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
