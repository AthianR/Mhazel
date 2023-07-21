@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="title" style="position: relative; text-align: center; font-size: 2rem; font-weight: 500; margin-bottom: 1rem">
                Produk Keychain
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-3">
                
                @foreach ($data as $item)
                    <div class="grid-container">
                        <div class="cell" >
                            <img style="border-radius: 5%" src="images/key/{{ $item->gambar_produk }}" alt="Gambar">
                        </div>
                        <div class="grid grid-cols-1">
                            <p style="text-align: center; font-size: 80%; font-weight: 500" >{{ $item->nama_produk }}</p>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="cell" style="margin-left: 1rem; margin-right: 1rem; margin-top:1rem">
                                <form action="{{ route('addToCart', $id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="w-full text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm py-2.5 text-center"
                                        type="submit">Add Cart</button>
                                </form>
                            </div>
                            <div class="cell" style="margin-left: 1rem; margin-right: 1rem; margin-top:1rem">
                                <a type="button"
                                    class="w-full text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm py-2.5 text-center">Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
