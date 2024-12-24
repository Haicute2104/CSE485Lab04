<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $bookreverse = Books::all();
        // $books = $bookreverse->reverse();
        $books = Books::orderBy('id', 'desc')->paginate(10);
        return view('Book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Books::create($request->all());
        return redirect()->route('book.index')->with('message', 'Them Thanh Cong');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $bookbyid = Books::find($id);
        return view('Book.edit', compact('bookbyid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bookbyid = Books::find($id);
        $bookbyid->update($request->all());
        return redirect()->route('book.index')->with('message', 'Sửa Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bookbyid = Books::find($id);
        $bookbyid->delete();
        return redirect()->route('book.index')->with('message', 'Xóa Thành Công');
    }
}
