<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use App\Models\User;
use Illuminate\Http\Request;

class FineController extends Controller
{
    /**
     * GET /api/fines
     * List all fines
     */
    public function index()
    {
        $fines = Fine::with(['user', 'borrow'])->get();
        return response()->json($fines);
    }

    /**
     * GET /api/fines/user/{id}
     * Get fines for a specific user
     */
    public function userFines($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $fines = Fine::where('user_id', $userId)
                     ->where('paid', false)
                     ->with('borrow')
                     ->get();

        return response()->json($fines);
    }

    /**
     * POST /api/fines
     * Create a fine record
     */
    public function store(Request $request)
    {
        $request->validate([
            'borrow_id' => 'required|exists:borrows,id',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'reason' => 'nullable|string',
        ]);

        $fine = Fine::create([
            'borrow_id' => $request->borrow_id,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'reason' => $request->reason ?? null,
            'paid' => false,
        ]);

        return response()->json(['message' => 'Fine created successfully', 'data' => $fine]);
    }

    /**
     * PUT /api/fines/{id}
     * Update fine record
     */
    public function update(Request $request, $id)
    {
        $fine = Fine::find($id);
        if (!$fine) {
            return response()->json(['message' => 'Fine not found'], 404);
        }

        $fine->update($request->only(['amount', 'reason', 'paid']));
        return response()->json(['message' => 'Fine updated successfully', 'data' => $fine]);
    }

    /**
     * POST /api/fines/pay/{id}
     * Mark fine as paid
     */
    public function pay($id)
    {
        $fine = Fine::find($id);
        if (!$fine) {
            return response()->json(['message' => 'Fine not found'], 404);
        }

        if ($fine->paid) {
            return response()->json(['message' => 'Fine is already paid'], 400);
        }

        $fine->paid = true;
        $fine->paid_at = now();
        $fine->save();

        return response()->json(['message' => 'Fine marked as paid', 'data' => $fine]);
    }
}
