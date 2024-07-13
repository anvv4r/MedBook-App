<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialty;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialties = Specialty::get();
        return view('dashboard.admin.specialty.index', compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.specialty.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        Specialty::create($request->all());
        return redirect()->route('specialty.index')->with('message', 'Specialty created Successfully');

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
        $specialty = Specialty::find($id);
        return view('dashboard.admin.specialty.edit', compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $specialty = Specialty::findOrFail($id);
        $specialty->name = $request->name;
        $specialty->save();

        return redirect()->route('specialty.index', $id)->with('message', 'Specialty updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $specialty = Specialty::findOrFail($id);
        $specialty->delete();
        return redirect()->route('specialty.index', $id)->with('message', 'Specialty deleted');
    }

    public function delete(string $id)
    {
        $specialty = Specialty::findOrFail($id);
        $specialty->delete();
        return redirect()->route('specialty.index', $id)->with('message', 'Specialty deleted');
    }
}
