<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return response()->json(Author::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:authors',
        ]);

        $author = Author::create($validated);
        return response()->json(['message' => 'Author created', 'data' => $author], 201);
    }

    public function show($id)
    {
        $author = Author::find($id);
        if (!$author) return response()->json(['message' => 'Author not found'], 404);
        return response()->json($author, 200);
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        if (!$author) return response()->json(['message' => 'Author not found'], 404);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:100',
            'email' => 'sometimes|email|unique:authors,email,' . $id,
        ]);

        $author->update($validated);
        return response()->json(['message' => 'Author updated', 'data' => $author], 200);
    }

    public function destroy($id)
    {
        $author = Author::find($id);
        if (!$author) return response()->json(['message' => 'Author not found'], 404);

        $author->delete();
        return response()->json(['message' => 'Author deleted'], 200);
    }
}
