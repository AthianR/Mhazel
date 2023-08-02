@extends('layouts.admin')
@section('title', 'User Admin')
@section('content')
    <div class="container">
        <div class="pb-4 pt-4">
            <div class="p-2 border-2 border-gray-900 border-dashed rounded-lg dark:border-gray-700">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    {{-- <livewire:user-list /> --}}
                    <form action="{{ route('delete.users') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="p-4 flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
                            <div>
                                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-md px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                    type="button">
                                    <span class="sr-only">Action button</span>
                                    Action
                                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownAction"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-md text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownActionButton">
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate
                                                account</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <button type="submit"
                                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:bg-red-700">
                                            Delete Selected Users
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative">
                                <input type="text" id="table-search-users"
                                    class="block p-2 pl-10 text-md text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search for users" autofocus>
                            </div>
                        </div>
                        <table class="w-full text-md text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all-search" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Lengkap
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    {{-- <th scope="col" class="px-6 py-3">
                                        Aksi
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input type="checkbox" id="checkbox"
                                                class="check-all w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->nama_lengkap }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Online
                                        </div>
                                    </td>
                                    {{-- <td class="px-6 py-4">
                                        {{ $item->status }}
                                    </td> --}}
                                    {{-- <td class="px-6 py-4">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <nav class="flex items-center justify-between pt-4 p-4 pl-2" aria-label="Table navigation">
                            {{ $data->links() }}
                        </nav>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
