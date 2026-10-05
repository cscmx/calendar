<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;
use Illuminate\Validation\Rule;

class LabelController extends Controller
{
    //create label
    public function create()
    {
        return view('labels.create');
    }

    //store-save details in label
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', Rule::unique('labels'), 'max:45', 'regex:/^[-\'\p{L}\p{M} ]+$/u']
        ]);

        $label = new Label($validatedData);
        $label->save();

        return redirect()->route('labels.index');
               
    }

    //show all labels in list
    public function index()
    {
        $labels = Label::all(); //me da la colección completa de labels

        return view('labels.list', compact('labels'));
    }

    //edit label
    public function edit(Label $label)
    {
        return view('labels.edit',compact('label'));
    }

    //update label info
    public function update(Request $request, Label $label)
    {
        $label->update($request->validate([
            'name' => ['required', Rule::unique('labels')->ignore($label), 'max:45', 'regex:/^[-\'\p{L}\p{M} ]+$/u']]));

        return redirect()
                ->route('labels.index');
    }

}
