<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\View\View;
use App\Models\Label;
use App\Models\Member;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function create()
    {
        $members = auth()->user()->members;
        $labels= Label::pluck('name','id')->toArray();
        return view('appointments.create', compact('labels','members'));
    }

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

        return redirect()->route('appointments.index');
               
    }

    public function index(Request $request)
    {
        $query = Appointment::query();
        if ($request->member)
            {
                $query->whereHas('members', function($q) use($request)
                {
                    $q->where('id', $request->member);
                });
            }
        if ($request->label)
            {
                $query->where('label_id', $request->label);
            }
        if ($request->filter === 'today')
            {
                $query->whereDate('start_date_time', today());
            }
        elseif($request->filter === 'week')
            {
                $query->whereBetween('start_date_time', [
                    now()->startOfWeek(),
                    now()->endOfWeek()
                ]);
            }

        $appointments = $query->get();
        $labels = Label::all();
        $members = Member::all();
        return view('appointments.list', compact('appointments', 'members', 'labels'));
    }

    public function edit(Appointment $appointment)
    {
        $members = auth()->user()->members;
        $labels = Label::all();
        return view('appointments.edit', compact('appointment','labels','members'));

    }

    public function update(Request $request, Appointment $appointment)
    {
        $validatedData = $request->validate([
            'title' => ['required','max:45', 'regex:/^[-\'\p{L}\p{M} ]+$/u'], 
            'description' => ['required','max:255', 'regex:/^[-\':,\p{L}\p{M}0-9 ]+$/u'], //asegurar este regex - algo más?
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

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function destroy(Appointment $appointment)
    {   
        $appointment->delete();
        
        return redirect()
                ->route('appointments.index');

    }
}
