@extends('layout.app')
@section('page_title', 'Tambah Buku')
@section('title', 'Tambah Buku')
@section('content')

<style>
    input[type="file"] {
    font-size: 12px; 
    padding: 5px;    
    margin: 0;       
}
</style>

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
                <form id="createBookForm" action="dashboard.html" method="GET">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Left Column - Book Cover -->
                        <div class="col-span-1">
                            <div class="flex flex-col items-center">
                                <div class="w-full h-64 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300 flex flex-col items-center justify-center cursor-pointer hover:bg-gray-50 mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 mb-2"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"></path></svg>
                                    <input type="file" name="cover_image" accept="image/*" >
                                    <span class="text-xs text-gray-400">JPG, PNG atau GIF (Maks. 2MB)</span>
                                   
                                </div>
                                <div class="flex items-center mt-2">
                                    <input id="available" name="available" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                                    <label for="available" class="ml-2 block text-sm text-gray-700">Tersedia untuk dipinjam</label>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Book Details -->
                        <div class="col-span-1 md:col-span-2 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Judul Buku <span class="text-red-500">*</span></label>
                                    <input type="text" id="title" name="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm" placeholder="Masukkan judul buku">
                                </div>
                                
                                <div>
                                    <label for="author" class="block text-sm font-medium text-gray-700">Penulis <span class="text-red-500">*</span></label>
                                    <input type="text" id="author" name="author" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm" placeholder="Masukkan nama penulis">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="publisher" class="block text-sm font-medium text-gray-700">Penerbit <span class="text-red-500">*</span></label>
                                    <input type="text" id="publisher" name="publisher" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm" placeholder="Masukkan nama penerbit">
                                </div>
                                
                                <div>
                                    <label for="year" class="block text-sm font-medium text-gray-700">Tahun Terbit <span class="text-red-500">*</span></label>
                                    <input type="number" id="year" name="year" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm" placeholder="Contoh: 2023">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="pages" class="block text-sm font-medium text-gray-700">Jumlah Halaman <span class="text-red-500">*</span></label>
                                    <input type="number" id="pages" name="pages" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm" placeholder="Contoh: 250">
                                </div>
                                
                                <div>
                                    <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                                    <input type="text" id="isbn" name="isbn" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm" placeholder="Contoh: 978-3-16-148410-0">
                                </div>
                            </div>

                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700">Kategori <span class="text-red-500">*</span></label>
                                <select id="category" name="category" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm">
                                    <option value="">Pilih Kategori</option>
                                    <option value="fiction">Fiksi</option>
                                    <option value="non-fiction">Non-Fiksi</option>
                                    <option value="science">Sains</option>
                                    <option value="technology">Teknologi</option>
                                    <option value="business">Bisnis</option>
                                    <option value="biography">Biografi</option>
                                    <option value="history">Sejarah</option>
                                    <option value="self-help">Pengembangan Diri</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi <span class="text-red-500">*</span></label>
                                <textarea id="description" name="description" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 sm:text-sm" placeholder="Masukkan deskripsi buku"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end space-x-3">
                        <a href="dashboard.html" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                            Batal
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


@endsection