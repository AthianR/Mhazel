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
                                    <div class="flex justify-center m-2">
                                        <button data-modal-target="staticModal" data-modal-toggle="staticModal"
                                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-small rounded-lg text-sm px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button">
                                            Checkout
                                        </button>
                                    </div>
                                </th>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Checkout
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="staticModal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <div class="grid gap-4 mb-2 sm:grid-cols-2 p-4">
                                    @foreach ($user as $ur)
                                        <label for="nama">Nama</label>
                                        <input type="text" class="rounded-lg"
                                            placeholder="{{ Auth::user()->nama_lengkap }}" disabled>
                                        <label for="phone">No Telephone</label>
                                        <input type="text" class="rounded-lg" placeholder="{{ $ur->phone }}"
                                            disabled>
                                        <label for="alamat">Alamat Pengiriman</label>
                                        <input type="text" class="rounded-lg"
                                            placeholder="{{ $ur->alamat_pengiriman }}" disabled>
                                    @endforeach
                                </div>
                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Nama Produk
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Variasi
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Jumlah
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Harga
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $totalbayar = 0;
                                            ?>
                                            @foreach ($data as $item)
                                                <?php
                                                $subtotal = $item->qty * $item->harga;
                                                ?>
                                                <tr
                                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $item->nama_produk }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $item->nama_variasi }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $item->qty }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        Rp. {{ number_format($subtotal) }}
                                                    </td>
                                                </tr>
                                                <?php
                                                $totalbayar += $subtotal;
                                                ?>
                                            @endforeach
                                            <tr>
                                                <th colspan="3" style="padding: 1.7rem">Total Bayar</th>
                                                <th style="padding: 1.7rem">Rp. {{ number_format($totalbayar) }}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <form action="{{ route('add.transaksi') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}"
                                        hidden>
                                    <input type="text" name="total_harga" id="total_harga"
                                        value="{{ $totalbayar }}" hidden>
                                    <input type="text" name="status_pembayaran" id="status_pembayaran"
                                        value="Pending" hidden>
                                    <input type="text" name="status_pengiriman" id="status_pengiriman"
                                        value="Sedang Dikemas" hidden>
                                    <input type="text" name="alamat_pengiriman" id="alamat_pengiriman"
                                        value="{{ $ur->alamat_pengiriman }}" hidden>
                                    <button data-modal-hide="staticModal" type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                        accept</button>
                                </form>
                                <button data-modal-hide="staticModal" type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                    </button>
                                <button data-modal-hide="staticModal" type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
