<input class="form-control mb-3 rounded" type="text" wire:model="search" placeholder="Cari produk...."
    aria-label="search">
<ul>
    <table class="w-full text-md text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Deskripsi
                </th>
                <th scope="col" class="px-6 py-3">
                    Stok
                </th>
                <th scope="col" class="px-6 py-3">
                    Harga
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $product)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" 
                        class="px-6 py-8 font-medium text-gray-900 whitespace-wrap dark:text-white">
                        {{ $product->nama_produk }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $product->deskripsi }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->stok }}
                    </td>
                    <td class="px-6 py-4">
                        Rp. {{ number_format($product->harga) }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</ul>
