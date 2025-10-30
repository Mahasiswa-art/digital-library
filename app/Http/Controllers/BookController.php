<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'year' => 'nullable|integer',
            'isbn' => 'nullable|string|unique:books',
        ]);

        $book = Book::create($validated);
        return response()->json(['message' => 'Book created', 'data' => $book], 201);
    }

    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) return response()->json(['message' => 'Book not found'], 404);
        return response()->json($book, 200);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) return response()->json(['message' => 'Book not found'], 404);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:150',
            'author_id' => 'sometimes|exists:authors,id',
            'publisher_id' => 'sometimes|exists:publishers,id',
            'year' => 'nullable|integer',
            'isbn' => 'nullable|string|unique:books,isbn,' . $id,
        ]);

        $book->update($validated);
        return response()->json(['message' => 'Book updated', 'data' => $book], 200);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) return response()->json(['message' => 'Book not found'], 404);

        $book->delete();
        return response()->json(['message' => 'Book deleted'], 200);
    }
}
