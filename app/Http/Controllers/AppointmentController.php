<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $businesspeople = Calendar::all();

        return view('appointments.create', compact('businesspeople'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'duration' => 'required|numeric',
            'businessperson_id' => 'required|numeric',
        ]);
        $time_slot = $this->isTimeSlotAvailable($request->businessperson_id,$request->start_time,$request->end_time);
        if($time_slot==true)
        {
            Appointment::create($validatedData);

            return redirect()->route('appointments.index')
                        ->with('success', 'Appointment created successfully.');
        }
        return redirect()->route('appointments.index')
                        ->with('error', 'Please Select Another Time.');
        
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $businesspeople = Calendar::all();

        return view('appointments.edit', compact('appointment', 'businesspeople'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validatedData = $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'duration' => 'required|numeric',
            'businessperson_id' => 'required|numeric',
        ]);

        $appointment->update($validatedData);

        return redirect()->route('appointments.index')
                        ->with('success', 'Appointment updated successfully.');
    }

    public function isTimeSlotAvailable($businesspersonId, $startTime, $endTime)
    {
        $appointments = Appointment::where('businessperson_id', $businesspersonId)->get();
        foreach ($appointments as $appointment) {
            if ($startTime < $appointment->end_time && $endTime > $appointment->start_time) {
                return false;
            }
        }
        return true;
    }
}
