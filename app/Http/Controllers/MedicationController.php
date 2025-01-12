<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'med-name' => 'required|string|max:255',
            'time-of-day' => 'required|array',
            'food-requirement' => 'required|in:with-food,without-food'
        ]);


        $medication = new Medication();
        $medication->name = $validated['med-name'];
        $medication->time_of_day = $validated['time-of-day'];
        $medication->food_requirement = $validated['food-requirement'];

        $medication->save();

        return "Done saving :) ";


            
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
    public function destroy($id)
    {
        $medication = Medication::findOrFail($id);
        $medication->delete();

        //Redirect to the dashboard
        return redirect('/dashboard')-> with('success', 'Medication deleted successfully');
    }


    public function dashboard()
    {

        $morningMeds = Medication::where('time_of_day', 'like', '%morning%')->get();
        $afternoonMeds = Medication::where('time_of_day', 'like', '%afternoon%')->get();
        $eveningMeds = Medication::where('time_of_day', 'like', '%evening%')->get();


        return view('dashboard', compact('morningMeds', 'afternoonMeds', 'eveningMeds'));
    }
}
