<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
{
    // 🔹 GET /api/publishers → ambil semua data penerbit
    public function index()
    {
        return response()->json(Publisher::all(), 200);
    }

    // 🔹 POST /api/publishers → tambah data penerbit baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $publisher = Publisher::create($validatedData);
        return response()->json($publisher, 201);
    }

    // 🔹 GET /api/publishers/{id} → ambil satu data penerbit
    public function show($id)
    {
        $publisher = Publisher::find($id);

        if (!$publisher) {
            return response()->json(['message' => 'Publisher not found'], 404);
        }

        return response()->json($publisher);
    }

    // 🔹 PUT/PATCH /api/publishers/{id} → update data penerbit
    public function update(Request $request, $id)
    {
        $publisher = Publisher::find($id);

        if (!$publisher) {
            return response()->json(['message' => 'Publisher not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $publisher->update($validatedData);
        return response()->json($publisher);
    }

    // 🔹 DELETE /api/publishers/{id} → hapus data penerbit
    public function destroy($id)
    {
        $publisher = Publisher::find($id);

        if (!$publisher) {
            return response()->json(['message' => 'Publisher not found'], 404);
        }

        $publisher->delete();
        return response()->json(['message' => 'Publisher deleted successfully']);
    }
}
