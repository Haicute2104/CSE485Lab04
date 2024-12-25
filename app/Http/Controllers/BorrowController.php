<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Reader;
use App\Models\Book;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::with(['reader', 'book'])->get();
        return view('borrows.index', compact('borrows'));
        return response()->json($borrows);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not typically needed for API-based controllers
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
        ]);

        $borrow = Borrow::create($validated);
        return response()->json($borrow, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrow = Borrow::with(['reader', 'book'])->findOrFail($id);
        return response()->json($borrow);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Not typically needed for API-based controllers
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'reader_id' => 'sometimes|exists:readers,id',
            'book_id' => 'sometimes|exists:books,id',
            'borrow_date' => 'sometimes|date',
            'return_date' => 'sometimes|date|after:borrow_date',
            'status' => 'sometimes|in:borrowed,returned',
        ]);

        $borrow = Borrow::findOrFail($id);
        $borrow->status = 1; //trạng thái returned
        $borrow->save();


        return redirect()->route('borrows.index')->with('success', 'Book has been marked as returned!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();

        return response()->json(['message' => 'Borrow record deleted successfully.']);
    }

    /**
     * Display the borrowing history of a specific reader.
     */
    public function history(string $readerId)
    {
        $history = Borrow::with('book')->where('reader_id', $readerId)->get();
        return response()->json($history);
    }
}