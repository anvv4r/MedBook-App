<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the logged-in user's ID
        $loggedInUserId = Auth::id();

        // Query to select the logged-in user if they are an admin or doctor,
        // and all users who are patients, including their roles
        $users = User::with('role') // Eager load the 'role' relationship
            ->where(function ($query) use ($loggedInUserId) {
                $query->where('id', $loggedInUserId)
                    ->whereIn('role_id', [1, 2]); // Admin or Doctor
            })
            ->orWhere(function ($query) {
                $query->where('role_id', 3); // Patients
            })
            ->get();

        return view('dashboard', compact('users'));

    }

    public function dashboard()
    {
        $loggedInUserId = Auth::id();

        $users = User::all();

        return view('dashboard', compact('users', 'loggedInUserId'));
    }

}
