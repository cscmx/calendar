<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;
use Illuminate\Validation\Rule;

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
        $labels = Label::all(); //me da la colección completa de labels

        return view('labels.list', compact('labels'));
    }
}
