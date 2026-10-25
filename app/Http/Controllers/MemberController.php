<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Member;
use Illuminate\View\View;
use Carbon\Carbon;

class MemberController extends Controller
{
    public function create()
    {
        return view('members.create');
    }

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

    public function index(Request $request)
    {
        $user = $request->user();
        $members = $user->members;

        return view('members.list', compact('members'));
    }

    public function edit(Member $member)
    {
        return view('members.edit',compact('member'));
    }

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
    
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function destroy(Member $member)
    {
        $count = $member->appointments()->count();
        
        if($count > 0)
            {
                return redirect()->route('members.index')->with('error',"This member is associated to {$count} appointments and can't be deleted");
            }

        $member->delete();
        return redirect()->route('members.index')->with('success', "Member deleted");

    }
}
