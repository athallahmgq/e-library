<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $books = Book::all();
        return view('dashboard.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|numeric',
            'pages' => 'required|numeric',
            'isbn' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'available' => 'required|boolean',
        ]);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers',  'public');
        }

        Book::create($data);

        return redirect()->route('dashboard.index')->with('success', 'Buku berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Book $book)
{
  
    return view('books.show', compact('book'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required',
            'pages' => 'required',
            'isbn' => 'required',
            'category' => 'required',
            'description' => 'required',
            'cover' => 'nullable',
            'available' => 'nullable',
        ]);
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'pages' => $request->pages,
            'isbn' => $request->isbn,
            'category' => $request->category,
            'description' => $request->description,
            'cover' => $request->cover,
            'available' => $request->available,
        ]);

        return redirect()->route('dashboard.index')
            ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
{
    $book->delete(); 
    return redirect()->route('dashboard.index')->with('delete', 'Buku berhasil dihapus');
}
}
