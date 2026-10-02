<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Member;

class MemberController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','max:45', 'regex:/^[-\'\p{L}\p{M} ]+$/u'],
            'date_of_birth' => ['nullable','date','required_if:category,family_member'],
            'category' => ['required', Rule::in(['personal','family_member','pet','home'])],
            'color' => ['required', 'regex:/^#([a-f0-9]{6})$/i']
        ]);

        $user = $request->user();
        $member = new Member($validatedData);
        $user->members()->save($member);

        return redirect()->route('dashboard');
               
    }


}
