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
        'judul' => 'required|string|max:255',
        'penulis' => 'required|string|max:255',
        'penerbit' => 'required|string|max:255',
        'tahun_terbit' => 'required|numeric',
        'jumlah_halaman' => 'required|numeric',
        'isbn' => 'required|string|max:255',
        'kategori' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'cover' => 'nullable|image|max:2048',
        'ketersediaan' => 'nullable|boolean',
    ]);

    if ($request->hasFile('cover')) {
        $data['cover'] = $request->file('cover')->store('covers', 'public');
    }

    Book::create($data);

    return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
