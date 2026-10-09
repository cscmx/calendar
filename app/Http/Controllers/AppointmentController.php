<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\View\View;
use App\Models\Label;


class AppointmentController extends Controller
{
    //create appointment
    public function create()
    {
        $members = auth()->user()->members;
        $label_id = Label::pluck('name','id');
        return view('appointments.create', compact('label_id'), compact('members'));
    }

    //store an appointment 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required','max:45', 'regex:/^[-\'\p{L}\p{M} ]+$/u'], 
            'description' => ['required','max:255', 'regex:/^[-\'\p{L}\p{M}0-9 ]+$/u'], //asegurar este regex - algo más?
            'start_date_time' => ['required'],
            'members' => ['required', 'array'],
            'members.*' => ['exists:members,id'],
            'label_id' => ['required', 'exists:labels,id'],
            'is_highlighted' => ['nullable', 'boolean'],
        ]);

        $validatedData['is_highlighted'] = $request->boolean('is_highlighted');
        $members = $validatedData['members'];
        $appointment = new Appointment($validatedData);
        $appointment->save();
        $appointment->members()->attach($members);

        return redirect()->route('dashboard');
               
    }
}
