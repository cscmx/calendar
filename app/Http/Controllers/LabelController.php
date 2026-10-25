<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Models\Appointment;

class LabelController extends Controller
{
    public function create()
    {
        return view('labels.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', Rule::unique('labels'), 'max:45', 'regex:/^[-\'\p{L}\p{M} ]+$/u']
        ]);

        $label = new Label($validatedData);
        $label->save();

        return redirect()->route('labels.index');
               
    }

    public function index()
    {
        $labels = Label::all(); 

        return view('labels.list', compact('labels'));
    }

    public function edit(Label $label)
    {
        return view('labels.edit',compact('label'));
    }

    public function update(Request $request, Label $label)
    {
        $label->update($request->validate([
            'name' => ['required', Rule::unique('labels')->ignore($label), 'max:45', 'regex:/^[-\'\p{L}\p{M} ]+$/u']]));

        return redirect()
                ->route('labels.index');
    }

    public function destroy(Label $label)
    {
        $count = $label->appointments()->count();
        if($count > 0)
            {
                return redirect()->route('labels.index')->with('error',"This label is associated to {$count} appointments and can't be deleted");
            }

        $label->delete();
        return redirect()->route('labels.index')->with('success', "Label deleted");

    }

}
