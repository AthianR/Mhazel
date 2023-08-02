@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="p-4">
        <div class="p-4 border-2 border-gray-500 border-dashed rounded-lg dark:border-gray-700 mt-14">
            {{-- @if (empty($cart) || count($cart) == 0)
                Tidak Ada Rekomendasi
            @else
                Ada Rekomendasi
            @endif --}}
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="images/key/GantunganBrio.png"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        {{-- <button
                            class="fixed px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition duration-300"
                            onclick="addToCart()">
                            Tambah ke Keranjang
                        </button> --}}
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="images/key/GantunganBrio.png"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="images/key/GantunganBrio.png"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="images/key/GantunganBrio.png"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="images/key/GantunganBrio.png"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-3">
                @foreach ($data as $item)
                    <div class="grid-container" style="-height: 100%; height: 100%">
                        <div class="cell">
                            <img style="border-radius: 5%" src="images/key/{{ $item->gambar_produk }}" alt="Gambar">
                        </div>
                        <div class="grid grid-cols-1">
                            <p style="text-align: center; font-size: 80%; font-weight: 500">{{ $item->nama_produk }}
                            </p>
                        </div>
                        <div class="grid grid-cols-1">
                            <p style="text-align: center; font-size: 100%; font-weight: 500">
                                Rp.{{ number_format($item->harga) }}</p>
                        </div>
                        @guest
                            <div class="grid grid-cols-1">
                                <div class="cell" style="margin-left: 1rem; margin-right: 1rem; margin-top:1rem">
                                    <a type="button" id="defaultModalButton" data-modal-toggle="defaultModal"
                                        class="w-full text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm py-2.5 text-center">Detail
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="grid grid-cols-2 md:grid-cols-2 gap-4 mt-3">
                                <form action="{{ route('add.to.cart', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    <div class="cell" style="margin-left: 1rem; margin-right: 1rem; margin-top:1rem">
                                        <button type="submit"
                                            class="w-full text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm py-2.5 text-center">
                                            {{-- <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="..."/>
                                        </svg> --}}
                                            Keranjang
                                        </button>
                                    </div>
                                </form>
                                <div class="cell" style="margin-left: 1rem; margin-right: 1rem; margin-top:1rem">
                                    <a type="button"
                                        class="w-full text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm py-2.5 text-center"
                                        data-modal-toggle="defaultModal" data-item="{{ json_encode($item) }}">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        @endguest
                        <div id="defaultModal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <!-- Modal header -->
                                    <div
                                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Detail Produk
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="defaultModal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="grid gap-4 mb-4 sm:grid-cols-1">
                                        <div>
                                            <label for="nama_produk"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                Produk</label>
                                            <input type="text" name="nama_produk" id="nama_produk"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="{{ $item->nama_produk }}" disabled>
                                        </div>
                                        <div>
                                            <label for="kategori_produk"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                                                Produk</label>
                                            <input type="text" name="kategori_produk" id="kategori_produk"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="{{ $item->nama_kategori }}" disabled>
                                        </div>
                                        <div>
                                            <label for="harga_produk"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                            </label>
                                            <input type="text" name="harga_produk" id="harga_produk"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Rp. {{ number_format($item->harga) }}" disabled>
                                        </div>
                                        <div>
                                            <label for="stok"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok
                                            </label>
                                            <input type="number" name="stok" id="stok"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="{{ $item->stok }}" disabled>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="description"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                            <textarea id="description" rows="4"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Write product description here" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="link p-4" style="right: 0; text-align: center">
                <p style="text-align: center">{{ $data->links() }}</p>
            </div>
        </div>
    </div>
    <script>
        document
            .querySelectorAll('[data-modal-toggle="defaultModal"]')
            .forEach((button) => {
                button.addEventListener("click", function() {
                    const itemData = JSON.parse(this.getAttribute("data-item"));
                    document.getElementById("nama_produk").value = itemData.nama_produk;
                    document.getElementById("kategori_produk").value =
                        itemData.nama_kategori;
                    document.getElementById("harga_produk").value = itemData.harga;
                    document.getElementById("stok").value = itemData.stok;
                    document.getElementById("description").value = itemData.deskripsi;
                });
            });
    </script>
@endsection
