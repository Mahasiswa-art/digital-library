<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        return response()->json(Publisher::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'nullable|string|max:255',
        ]);

        $publisher = Publisher::create($validated);
        return response()->json(['message' => 'Publisher created', 'data' => $publisher], 201);
    }

    public function show($id)
    {
        $publisher = Publisher::find($id);
        if (!$publisher) return response()->json(['message' => 'Publisher not found'], 404);
        return response()->json($publisher, 200);
    }

    public function update(Request $request, $id)
    {
        $publisher = Publisher::find($id);
        if (!$publisher) return response()->json(['message' => 'Publisher not found'], 404);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:100',
            'address' => 'nullable|string|max:255',
        ]);

        $publisher->update($validated);
        return response()->json(['message' => 'Publisher updated', 'data' => $publisher], 200);
    }

    public function destroy($id)
    {
        $publisher = Publisher::find($id);
        if (!$publisher) return response()->json(['message' => 'Publisher not found'], 404);

        $publisher->delete();
        return response()->json(['message' => 'Publisher deleted'], 200);
    }
}
