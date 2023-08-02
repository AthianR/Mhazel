@extends('layouts.app')
@section('Title', 'History')
@section('content')
    <div class="p-4">
        <div class="p-4 border-2 border-gray-500 border-dashed rounded-lg dark:border-gray-700 mt-1">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="title" style="text-align: center; font-size: 2rem; font-weight: 500; margin-bottom: 1rem">
                    Menunggu Pembayaran
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                No
                                {{-- <div class="flex items-center">
                                <input id="checkAll" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkAll" class="sr-only">checkbox</label>
                            </div> --}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Transaksi
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Nama Produk
                            </th> --}}
                            <th scope="col" class="px-6 py-3">
                                Qty
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status Pembayaran
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status Pengiriman
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (empty($data) || count($data) == 0)
                            <tr>
                                <td colspan="7">
                                    <p class="text-center mt-2 mb-2">Tidak ada yang perlu dibayar!</p>
                                    <br>
                                    <p class="text-center mt-2 mb-2"><a
                                            class="py-2 px-3 text-sm font-medium text-center text-black rounded-lg bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:focus:ring-primary-900 "
                                            type="button" href="{{ route('cart') }}">Transaksi Sekarang</a></p>
                                </td>
                            </tr>
                        @else
                            <?php $no = 1; ?>
                            @foreach ($data as $item)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            {{ $no++ }}
                                        </div>
                                    </td>
                                    <td class="px-6">
                                        {{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('l, d F Y') }}
                                    </td>
                                    {{-- <td scope="row" class="px-6  font-semibold text-gray-900 dark:text-white">
                                        @foreach ($produk as $it)
                                            <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 150px">{{ $it->nama_produk }},</p>
                                        @endforeach
                                    </td> --}}
                                    <td class="px-6">
                                        {{ $item->qty }}
                                    </td>
                                    <td class="px-6">
                                        Rp. {{ number_format($item->total_harga) }}
                                    </td>
                                    <td class="px-6 flex items-center pt-6">
                                        @if ($item->status_pembayaran === 'Pending')
                                        <span class="flex w-3 h-3 bg-red-500 rounded-full"></span>
                                        @else
                                        <span class="flex w-3 h-3 bg-green-500 rounded-full"></span>
                                        @endif
                                        <p>{{ $item->status_pembayaran }}</p>
                                    </td>
                                    <td class="px-6">
                                        {{ $item->status_pengiriman }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="px-6 py-4">
                                    @if ($item->status_pembayaran === 'Pending')
                                        <button type="button" id="bayar" data-modal-toggle="bayar"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Bayar
                                            Sekarang</button>
                                    @else
                                        <button type="button"
                                            class="text-white bg-gray-400 cursor-not-allowed opacity-50 focus:ring-4 focus:outline-none focus:ring-gray-500 font-medium rounded-lg text-sm px-2 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800"
                                            disabled>Bayar Sekarang</button>
                                    @endif
                                </td>
                            </tr>
                            <div id="bayar" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                        <!-- Modal header -->
                                        <div
                                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                Form Pembayaran
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-toggle="bayar">
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
                                        <form action="{{ route('pembayaran.user', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                <input type="text" name="status_pembayaran" id="status_pembayaran" value="Dibayar" disabled>
                                                <input type="text" name="status_pengiriman" id="status_pengiriman" value="Sedang Dikemas" disabled>
                                            </div>
                                            <button type="submit" class="text-black inline-flex items-center bg-gray-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                Proses Pembayaran
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </tbody>
                </table>

            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg pt-6">
                <div class="title" style="text-align: center; font-size: 2rem; font-weight: 500; margin-bottom: 1rem">
                    Riwayat Transaksi
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                No
                                {{-- <div class="flex items-center">
                                <input id="checkAll" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkAll" class="sr-only">checkbox</label>
                            </div> --}}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Transaksi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Produk
                            </th>
                            {{-- <th scope="col" class="px-6 py-3">
                                Qty
                            </th> --}}
                            <th scope="col" class="px-6 py-3">
                                Total Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status Pembayaran
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status Pengiriman
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (empty($riwayat) || count($riwayat) == 0)
                            <tr>
                                <td colspan="7">
                                    <p class="text-center mt-2 mb-2">Belum Ada Riwayat Transaksi!</p>
                                </td>
                            </tr>
                        @else
                            <?php $no = 1; ?>
                            @foreach ($riwayat as $rw)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            {{ $no++ }}
                                        </div>
                                    </td>
                                    <td class="px-6">
                                        {{ \Carbon\Carbon::parse($rw->tanggal_transaksi)->format('l, d F Y') }}
                                    </td>
                                    <td scope="row" class="px-6  font-semibold text-gray-900 dark:text-white">
                                        @foreach ($produk as $it)
                                            <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 150px">{{ $it->nama_produk }},</p>
                                        @endforeach
                                    </td>
                                    {{-- <td class="px-6">
                                        {{ $item->qty }}
                                    </td> --}}
                                    <td class="px-6">
                                        Rp. {{ number_format($rw->total_harga) }}
                                    </td>
                                    <td class="px-6 flex items-center pt-6">
                                        @if ($rw->status_pembayaran === 'Pending')
                                        <span class="flex w-3 h-3 bg-red-500 rounded-full"></span>
                                        @else
                                        <span class="flex w-3 h-3 bg-green-500 rounded-full"></span>
                                        @endif
                                        <p>{{ $rw->status_pembayaran }}</p>
                                    </td>
                                    <td class="px-6">
                                        {{ $rw->status_pengiriman }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
