@extends('layouts.admin')
@section('title', 'add-kategori')
@section('content')
    <div class="container">
        <div class="pb-4 pt-4">
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
                    <form action="{{ route('add.dataKategori') }}" method="post">
                        @csrf
                        <div class="grid grid-cols-2">
                            <div class="form p-4">
                                <label for="base-input"
                                    class="block mb-2 mr-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Kategori</label>
                                <input type="text" id="base-input" name="nama_kategori" required autofocus
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
        <div class="pb-4 pt-4">
            <div class="p-2 border-2 border-gray-900 border-dashed rounded-lg dark:border-gray-700">
                <div class="kartu bg-gray-300">
                    <div class="title" style="text-align: center;">
                        <p style="font-size: 2rem; font-weight: 500 ">Daftar Kategori</p>
                    </div>
                    <table class="w-full text-md text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-900 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID Kategori
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Kategori
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($data as $item)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" style="max-width: 100px;"
                                        class="px-6 py-2 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                        {{ $no++ }}
                                    </th>
                                    <td class="px-6 py-2">
                                        {{ $item->nama_kategori }}
                                    </td>
                                    <td>
                                        {{-- <form id="formDelete{{ $item->id }}"
                                            action="{{ route('hapus.kategori', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{ $item->id }})">
                                                Hapus
                                            </button>
                                        </form>
                                        <script>
                                            function confirmDelete(id) {
                                                Swal.fire({
                                                    title: 'Are you sure?',
                                                    text: "You won't be able to revert this!",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Yes, delete it!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById(`formDelete${id}`).submit();
                                                        Swal.fire(
                                                            'Deleted!',
                                                            'Your file has been deleted.',
                                                            'success'
                                                        )
                                                    }
                                                })
                                            }
                                        </script> --}}
                                        <a href=""><svg
                                                class="w-6 h-6 text-red-600 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                                <path
                                                    d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                            </svg></a>
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
