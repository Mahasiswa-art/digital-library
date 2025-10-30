<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return response()->json(Member::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:members',
            'phone' => 'nullable|string|max:15',
        ]);

        $member = Member::create($validated);
        return response()->json(['message' => 'Member created', 'data' => $member], 201);
    }

    public function show($id)
    {
        $member = Member::find($id);
        if (!$member) return response()->json(['message' => 'Member not found'], 404);
        return response()->json($member, 200);
    }

    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        if (!$member) return response()->json(['message' => 'Member not found'], 404);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:100',
            'email' => 'sometimes|email|unique:members,email,' . $id,
            'phone' => 'nullable|string|max:15',
        ]);

        $member->update($validated);
        return response()->json(['message' => 'Member updated', 'data' => $member], 200);
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        if (!$member) return response()->json(['message' => 'Member not found'], 404);

        $member->delete();
        return response()->json(['message' => 'Member deleted'], 200);
    }
}
