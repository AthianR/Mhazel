@extends('layouts.app')
@section('Title', 'History')
@section('content')
    <div class="p-4">
        <div class="p-4 border-2 border-gray-500 border-dashed rounded-lg dark:border-gray-700 mt-1">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                                    <p class="text-center mt-2 mb-2">Belum Ada Riwayat Transaksi!</p>
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
                                            {{-- <input id="checkbox{{ $item->id }}" type="checkbox" name="item[]"
                                            class="checkSingle w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox{{ $item->id }}" class="sr-only">checkbox</label> --}}
                                        </div>
                                    </td>
                                    <td class="px-6">
                                        {{ $item->gambar_produk }}
                                    </td>
                                    <td scope="row" class="px-6  font-semibold text-gray-900 dark:text-white">
                                        {{ $item->nama_produk }}
                                    </td>
                                    <td class="px-6">
                                        {{ $item->nama_variasi }}
                                    </td>
                                    <td class="px-6">
                                        <input type="number" value="{{ $item->qty }}" name="qty" id="qty"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="{{ $item->qty }}">
                                    </td>
                                    <td class="px-6">
                                        <p id="hargaProduk">Rp.{{ number_format($item->harga_produk) }}</p>
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
                                    {{-- <td class="px-6" >
                                <p id="totalHarga">Rp.{{ number_format($item->qty * $item->harga_produk) }}</p>
                            </td> --}}
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="px-6">
                                    <p id="totalHarga" hidden>Rp.{{ number_format($item->qty * $item->harga_produk) }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="px-6">
                                    <button type="button" id="btnCheckout"
                                        class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 font-medium rounded-lg text-sm px-2 py-2.5 text-center mb-2 mt-1">Checkout</button>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
