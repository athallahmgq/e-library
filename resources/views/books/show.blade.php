

@extends('layout.app')
@section('page_title', 'Lihat Buku')
@section('title', 'Lihat Buku')
@section('content')
<main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-50">
    <div class="max-w-5xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="mb-4 text-sm" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li>
                    <a href="{{ route('dashboard.index') }}" class="text-gray-500 hover:text-gray-700">Dashboard</a>
                </li>
                <li class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="m9 18 6-6-6-6"></path></svg>
                    <span class="ml-2 text-gray-900 font-medium">Lihat Buku</span>
                </li>
            </ol>
        </nav>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Left Column - Book Cover and Actions -->
                    <div class="col-span-1">
                        <div class="flex flex-col items-center">
                            <!-- Book Cover -->
                            
                            <div class="w-full h-96 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300 flex flex-col items-center justify-center cursor-pointer hover:bg-gray-50 mb-4 relative">
                                @if($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" alt="Cover Buku" class="w-full h-full object-cover rounded-lg absolute inset-0">
                                @else
                                <p class="text-gray-500 italic">Tidak ada cover</p>
                                @endif
                            </div>
                            
                            <!-- Status Badge -->
                            <div class="mb-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><path d="m9 11 3 3L22 4"></path></svg>
                                    Tersedia {{ $book->available }}
                                </span>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex w-full space-x-2">
                                @if (auth()->user()->role === 'admin')
                                <a href="{{ route('books.edit', $book->id) }}" class="flex-1 inline-flex justify-center items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path></svg>
                                    Edit
                                </a>
                                @endif

                                @if (auth()->user()->role === 'user')
                                <a href="" class="flex-1 inline-flex justify-center items-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600  focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                                    <svg class="w-6 h-6 text-white py-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M8 10V7a4 4 0 1 1 8 0v3h1a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h1Zm2-3a2 2 0 1 1 4 0v3h-4V7Zm2 6a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                                      </svg>
                                    Hanya Admin 
                                </a>
                                @endif
                                
                                <button type="button" class="flex-1 inline-flex justify-center items-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                                    Download
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Book Details -->
                    <div class="col-span-1 md:col-span-2">
                        <!-- Book Title and Author -->
                        <div class="mb-6">
                            <h1 class="text-2xl font-bold text-gray-900 mb-1">{{ $book->title }}</h1>
                            <p class="text-lg text-gray-600">oleh {{ $book->author }}</p>
                        </div>
                        
                        <!-- Book Details -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4 mb-6">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Penerbit</h3>
                                <p class="mt-1 text-sm text-gray-900">{{ $book->publisher }}</p>
                            </div>
                            
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Tahun Terbit</h3>
                                <p class="mt-1 text-sm text-gray-900">{{ $book->year }}</p>
                            </div>
                            
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Jumlah Halaman</h3>
                                <p class="mt-1 text-sm text-gray-900">{{ $book->pages }}</p>
                            </div>
                            
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">ISBN</h3>
                                <p class="mt-1 text-sm text-gray-900">{{ $book->isbn }}</p>
                            </div>
                            
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Kategori</h3>
                                <p class="mt-1 text-sm text-gray-900">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $book->category }}
                                    </span>
                                </p>
                            </div>
                            
                            <div>
                                <h3 class="text-sm font-medium text-gray-500">Tanggal Ditambahkan</h3>
                                <p class="mt-1 text-sm text-gray-900">{{ $book->waktu }}</p>
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-2">Deskripsi</h3>
                            <div class="prose prose-sm max-w-none text-gray-900">
                                <p>{{ $book->description }}</p>
                            </div>
                        </div>
                        
                        <!-- Borrowing History -->
                        <div class="mt-8">
                            <h3 class="text-base font-medium text-gray-900 mb-3">Riwayat Peminjaman</h3>
                            <div class="bg-gray-50 rounded-lg overflow-hidden border border-gray-200">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Peminjam</th>
                                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pinjam</th>
                                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Kembali</th>
                                            <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">Budi Santoso</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">10 Mar 2023</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">24 Mar 2023</td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Dikembalikan
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">Siti Rahma</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">02 Feb 2023</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">16 Feb 2023</td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Dikembalikan
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">Ahmad Fauzi</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">15 Jan 2023</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">29 Jan 2023</td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Dikembalikan
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
