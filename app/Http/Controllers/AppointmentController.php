<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\View\View;
use App\Models\Label;
use App\Models\Member;


class AppointmentController extends Controller
{
    //create appointment
    public function create()
    {
        $members = auth()->user()->members;
        $labels= Label::pluck('name','id')->toArray();
        return view('appointments.create', compact('labels','members'));
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
         
        $appointment = new Appointment($validatedData);
        $appointment->save();
        $appointment->members()->attach($members);

        return redirect()->route('dashboard');
               
    }

    public function index()
    {
        $appointments = Appointment::all();

        return view('appointments.list', compact('appointments'));
    }

    public function edit(Appointment $appointment)
    {
        $members = auth()->user()->members;
        $labels = Label::pluck('name','id');
        return view('appointments.edit', compact('appointment','labels','members'));

    }

    public function update(Request $request, Appointment $appointment)
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
        $appointment->members()->sync($members);
        $appointment->update($validatedData);

        return redirect()
            ->route('appointments.index');

    }
}
