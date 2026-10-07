<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\View\View;


class AppointmentController extends Controller
{
    //create appointment
    public function create()
    {
        return view('appointments.create');
    }

    //store an appointment 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','max:45', 'regex:/^[-\'\p{L}\p{M} ]+$/u'], 
            'description' => ['required','max:255', 'regex:/^[-\'\p{L}\p{M}0-9 ]+$/u'], //asegurar este regex - algo más?
            'start_date_time' => ['required'],
            'is_highlighted' => ['nullable', 'boolean']
        ]);

        $validatedData['is_highlighted'] = $request->boolean('is_highlighted');

        $member = $request->member;
        $appointment = new Appointment($validatedData);
        $appointment->member()->save($appointment);

        return redirect()->route('dashboard');
               
    }
}
