@extends('layouts.admin')
@section('title', 'add-produk')
@section('content')
    <div class="container">
        <div class="pb-4 pt-4 sm:ml-64">
            <div class="p-2 border-2 border-gray-900 border-dashed rounded-lg dark:border-gray-700">
                <div class="kartu bg-gray-300">
                    <form action="{{ route('add.data') }}" method="post">
                        @csrf
                        <div class="grid grid-cols-2">
                            <div class="form p-4">
                                <label for="base-input"
                                    class="block mb-2 mr-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Produk</label>
                                <input type="text" id="base-input" name="nama_produk" required autofocus
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="form p-4">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                                    Produk</label>
                                <input type="text" id="base-input" name="kategori" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="form p-4">
                                <label for="base-input"
                                    class="block mb-2 mr-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                    Produk</label>
                                <input type="text" id="base-input" name="harga_produk" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="form p-4">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Varian
                                    Produk</label>
                                <input type="text" id="base-input" name="nama_varian" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="form p-4">
                                <label for="base-input"
                                    class="block mb-2 mr-2 text-sm font-medium text-gray-900 dark:text-white">Stok
                                    Produk</label>
                                <input type="number" id="base-input" name="stock" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="form p-4">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar
                                    Produk</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="user_avatar_help" id="user_avatar" type="file" name="gambar_produk" required>
                            </div>
                        </div>
                        <div class="text p-4">
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                                Produk</label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukan deskripsi produk..."></textarea>
                        </div>
                        <div class="button p-4" style="position: relative; justify-content: space-between">
                            <button type="button" class="btn btn-danger" style="position: absolute; bottom: 10px; right: 130px; background-color: red; color:black; font-weight: 500;">Kembali</button>
                            <button type="submit" class="btn btn-success" style="position: absolute; bottom: 10px; right: 25px; font-weight: 500; background-color: green">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
