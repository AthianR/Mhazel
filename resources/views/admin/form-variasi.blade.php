@extends('layouts.admin')
@section('title', 'add-variasi')
@section('content')
    <div class="container">
        <div class="pb-4 pt-4 sm:ml-64">
            <div class="p-2 border-2 border-gray-900 border-dashed rounded-lg dark:border-gray-700">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="kartu bg-gray-300">
                    <form action="{{ route('add.dataVariasi') }}" method="post">
                        @csrf
                        <div class="grid grid-cols-2">
                            <div class="form p-4">
                                <label for="base-input"
                                    class="block mb-2 mr-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Variasi</label>
                                <input type="text" id="base-input" name="nama_varian" required autofocus
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="form p-4">
                                <label for="base-input"
                                    class="block mb-2 mr-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                    Produk</label>
                                <input type="text" id="base-input" name="harga_produk" required autofocus
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="form p-4">
                                <label for="base-input"
                                    class="block mb-2 mr-2 text-sm font-medium text-gray-900 dark:text-white">Gambar
                                    Produk</label>
                                <input type="text" id="base-input" name="gambar_produk" required autofocus
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="form p-4">
                                <label for="base-input"
                                    class="block mb-2 mr-2 text-sm font-medium text-gray-900 dark:text-white">Stok
                                    Produk</label>
                                <input type="text" id="base-input" name="stok" required autofocus
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                        </div>
                        <div class="button p-4" style="position: relative; justify-content: space-between">
                            <button type="button" class="btn btn-danger"
                                style="position: absolute; bottom: 10px; right: 130px; background-color: red; color:black; font-weight: 500;">Kembali</button>
                            <button type="submit" class="btn btn-success" id="add-produk"
                                style="position: absolute; bottom: 10px; right: 25px; font-weight: 500; background-color: green">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="pb-4 pt-4 sm:ml-64">
            <div class="p-2 border-2 border-gray-900 border-dashed rounded-lg dark:border-gray-700">
                <div class="kartu bg-gray-300">
                    <div class="title" style="text-align: center;">
                        <p style="font-size: 2rem; font-weight: 500 ">Daftar Variasi</p>
                    </div>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-900 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID Variasi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Variasi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Gambar Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Stok Produk
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" style="max-width: 100px;"
                                        class="px-6 py-2 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                        {{ $item->id }}
                                    </th>
                                    <td class="px-6 py-2">
                                        {{ $item->nama_varian }}
                                    </td>
                                    <td class="px-6 py-2">
                                        {{ $item->harga_produk }}
                                    </td>
                                    <td class="px-6 py-2">
                                        {{ $item->gambar_produk }}
                                    </td>
                                    <td class="px-6 py-2">
                                        {{ $item->stock }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
