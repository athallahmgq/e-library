<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

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
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'available' => 'nullable|boolean',
        ]);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }
        
        $data['available'] = $request->has('available') ? true : false;
        
        Book::create($data);
        
        return redirect()->route('dashboard.index')->with('success', 'Buku berhasil ditambahkan 😇');
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
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'year' => 'required|numeric',
            'pages' => 'required|numeric',
            'isbn' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'available' => 'nullable|boolean',
        ]);

        $data = $request->except(['cover', 'available', '_token', '_method']);
        $data['available'] = $request->has('available') ? true : false;
        
     
        if ($request->hasFile('cover')) {
            
            if ($book->cover) {
                Storage::disk('public')->delete($book->cover);
            }
            
            
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        } else {
        }
        
        $book->update($data);

        return redirect()->route('dashboard.index')
            ->with('update', 'Buku berhasil diubah 😃');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->cover) {
            Storage::disk('public')->delete($book->cover);
        }
        
        $book->delete(); 
        return redirect()->route('dashboard.index')->with('delete', 'Buku berhasil dihapus 🥲');
    }
}