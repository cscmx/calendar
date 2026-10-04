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

        return redirect()->route('members.index');
               
    }

    /**
     * View all members.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $members = $user->members; //me da la colección completa de members

        return view('members.list', compact('members'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('members.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $member->update($request->validate([
            'name' => ['required','max:45', 'regex:/^[-\'\p{L}\p{M} ]+$/u'],
            'date_of_birth' => ['nullable','date','required_if:category,family_member'],
            'category' => ['required', Rule::in(['personal','family_member','pet','home'])],
            'color' => ['required', 'regex:/^#([a-f0-9]{6})$/i']
            ]));

        return redirect()
                ->route('members.index');
    }
    
    /**
     * View only one member.
     */
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }
}
