@extends('layouts.app')
@section('title', 'Halaman Checkout')
@section('content')
    <div class="p-4">
        <div class="p-4 border-2 border-gray-500 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="title">
                <p class="justify-center" style="text-align: center; padding-bottom: 2rem; font-size: 2rem; font-weight: 600">
                    Checkout</p>
            </div>
            <div class="card">
                <div class="grid gap-4 mb-2 sm:grid-cols-2 p-4">
                    @foreach ($user as $ur)
                        <label for="nama">Nama</label>
                        <input type="text" class="rounded-lg" placeholder="{{ Auth::user()->nama_lengkap }}" disabled>
                        <label for="phone">No Telephone</label>
                        <input type="text" class="rounded-lg" placeholder="{{ $ur->phone }}" disabled>
                        <label for="alamat">Alamat Pengiriman</label>
                        <input type="text" class="rounded-lg" placeholder="{{ $ur->alamat_pengiriman }}" disabled>
                    @endforeach
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
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
                        {{-- <tfoot>
                            <tr class="font-semibold text-gray-900 dark:text-white">
                                <th scope="row" class="px-6 py-3 text-base">Total</th>
                                <td class="px-6 py-3">3</td>
                                <td class="px-6 py-3">21,000</td>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <form action="{{ route('add.transaksi') }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden>
                        <input type="text" name="total_harga" id="total_harga" value="{{ $totalbayar }}" hidden>
                        <input type="text" name="status_pembayaran" id="status_pembayaran" value="Pending" hidden>
                        <input type="text" name="status_pengiriman" id="status_pengiriman" value="Menunggu Pembayaran"
                            hidden>
                        <input type="text" name="alamat_pengiriman" id="alamat_pengiriman"
                            value="{{ $ur->alamat_pengiriman }}" hidden>
                        <input type="text" name="nama_produk" id="nama_produk" value="{{ $item->nama_produk }}" hidden>
                        <input type="text" name="qty" id="qty" value="{{ $item->qty }}" hidden>
                        <button data-modal-hide="staticModal" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Checkout</button>
                    </form>
                    <button data-modal-hide="staticModal" type="button"
                        class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a href="{{ route('cart') }}">Kembali</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
