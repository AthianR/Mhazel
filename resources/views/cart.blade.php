@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div id="myModal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" id="cancelBtn"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="myModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
                        this product?</h3>
                    <a href="#"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">Ya,
                        hapus item</a>
                    <button data-modal-hide="myModal" type="button" id="closeBtn"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Batalkan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4">
        <div class="p-4 border-2 border-gray-500 border-dashed rounded-lg dark:border-gray-700 mt-1">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="title" style="text-align: center; font-size: 2rem; font-weight: 500; margin-bottom: 1rem">
                    Keranjang Kamu
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gambar
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Variasi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Qty
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Harga
                            </th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (empty($data) || count($data) == 0)
                            <tr>
                                <td colspan="8">
                                    <p class="text-center mt-2 mb-2">Keranjang Kamu Masih Kosong!</p>
                                    <br>
                                    <p class="text-center mt-2 mb-2"><a
                                            class="py-2 px-3 text-sm font-medium text-center text-black rounded-lg bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-900 "
                                            type="button" href="{{ route('dashboard.user') }}">Plih Produk</a></p>
                                </td>
                            </tr>
                        @else
                            <?php
                            $no = 1;
                            $grandtotal = 0;
                            ?>
                            @foreach ($data as $item)
                                <?php
                                $subtotal = $item->qty * $item->harga;
                                ?>
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            {{ $no++ }}
                                        </div>
                                    </td>
                                    <td class="px-6">
                                        <p>{{ $item->gambar_produk }}</p>
                                    </td>
                                    <td scope="row" class="px-6  font-semibold text-gray-900 dark:text-white">
                                        {{ $item->nama_produk }}
                                    </td>
                                    <td class="px-6">
                                        {{ $item->nama_variasi }}
                                    </td>
                                    <td class="px-6">
                                        <form action="{{ route('min.qty', ['id' => $item->id]) }}" method="post">
                                            @csrf
                                            <input type="text" name="produk_id" id="produk_id"
                                                value="{{ $item->produk_id }}" hidden>
                                            <input type="number" name="qty" id="qty"
                                                value="{{ $nilaiDefaultQty }}" hidden>
                                            <button type="submit" class="p-2" style="font-size: 1.5rem">-</button>
                                        </form>
                                        <input class="px-2 rounded-lg" style="max-width: 3rem" type="number"
                                            value="{{ $item->qty }}" name="qty" id="qty" disabled>
                                        <form action="{{ route('add.qty', ['id' => $item->id]) }}" method="post">
                                            @csrf
                                            <input type="text" name="produk_id" id="produk_id"
                                                value="{{ $item->produk_id }}" hidden>
                                            <input type="number" name="qty" id="qty"
                                                value="{{ $nilaiDefaultQty }}" hidden>
                                            <button type="submit" class="p-2" style="font-size: 1.5rem">+</button>
                                        </form>
                                    </td>
                                    <td class="px-6">
                                        Rp.{{ number_format($item->harga) }}
                                    </td>
                                    <td class="px-6">
                                        Rp.{{ $subtotal }}
                                    </td>
                                    <td class="px-6">
                                        <form id="formDelete{{ $item->id }}"
                                            action="{{ route('delete.cart', $item->id) }}" method="POST">
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
                                        </script>
                                    </td>
                                </tr>
                                <?php
                                $grandtotal += $subtotal;
                                ?>
                            @endforeach
                            <tr>
                                <th></th>
                                <th></th>
                                <th colspan="4" class="p-3">Grand Total</th>
                                <th>
                                    <p class="pl-5">Rp. {{ number_format($grandtotal) }}</p>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="7"></th>
                                <th>
                                    @if (empty($user) || count($user)== 0)
                                        <div class="flex justify-center m-2">
                                            <button type="button" data-modal-target="popup-modal"
                                                data-modal-toggle="popup-modal"
                                                class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Checkout</button>
                                        </div>
                                        <div id="popup-modal" tabindex="-1"
                                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative w-full max-w-md max-h-full">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="popup-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-6 text-center">
                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                        <h3
                                                            class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                            Harap isi alamat pada profile kamu!</h3>
                                                        <button data-modal-hide="popup-modal" type="button"
                                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                            <a href="{{ route('profile.user') }} ">Ya isi alamat</a>
                                                        </button>
                                                        <button data-modal-hide="popup-modal" type="button"
                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex justify-center m-2">
                                            <a href="{{ route('checkout') }}"
                                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-small rounded-lg text-sm px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button"">Checkout</a>
                                        </div>
                                    @endif
                                    {{-- <div class="flex justify-center m-2">
                                        <a href="{{ route('checkout') }}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-small rounded-lg text-sm px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button"">Checkout</a>
                                    </div> --}}
                                </th>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
