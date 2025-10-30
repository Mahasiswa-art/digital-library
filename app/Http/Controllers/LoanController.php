<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        return response()->json(Loan::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'loan_date' => 'required|date',
            'return_date' => 'nullable|date',
        ]);

        $loan = Loan::create($validated);
        return response()->json(['message' => 'Loan created', 'data' => $loan], 201);
    }

    public function show($id)
    {
        $loan = Loan::find($id);
        if (!$loan) return response()->json(['message' => 'Loan not found'], 404);
        return response()->json($loan, 200);
    }

    public function update(Request $request, $id)
    {
        $loan = Loan::find($id);
        if (!$loan) return response()->json(['message' => 'Loan not found'], 404);

        $validated = $request->validate([
            'return_date' => 'nullable|date',
        ]);

        $loan->update($validated);
        return response()->json(['message' => 'Loan updated', 'data' => $loan], 200);
    }

    public function destroy($id)
    {
        $loan = Loan::find($id);
        if (!$loan) return response()->json(['message' => 'Loan not found'], 404);

        $loan->delete();
        return response()->json(['message' => 'Loan deleted'], 200);
    }
}
