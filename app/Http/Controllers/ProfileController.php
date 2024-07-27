<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }
    public function store(Request $request)
    {
        $this->validateUpdate($request);

        $data = $request->all();
        $user = User::find(auth()->user()->id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $user->password;
        }

        $user->update($data);

        return redirect()->back()->with('message', 'Profile Info Updated Successfully');
    }
    public function profilePic(Request $request)
    {
        $this->validate($request, ['file' => 'required|image|mimes:jpeg,jpg,png']);
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('/images');
            $image->move($destination, $name);

            $user = User::where('id', auth()->user()->id)->update(['image' => $name]);

            return redirect()->back()->with('message', 'Profile Image Updated Successfully');
        }
    }
    public function validateUpdate($request)
    {
        return $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . auth()->user()->id,
            'dob' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|numeric',
        ]);
    }
}
