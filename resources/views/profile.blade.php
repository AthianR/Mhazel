@extends('layouts.app')
@section('title', 'Profile User')
@section('content')
    <div class="p-4">
        <div class="p-4 border-2 border-gray-500 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <form action="{{ route('update.user') }}" method="post">
                @csrf
                @method('POST')
                <div class="card p-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Lengkap</label>
                    <input type="text" id="nama_lengkap"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="{{ Auth::user()->nama_lengkap }}" required disabled>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-Mail</label>
                    <input type="text" id="email"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="{{ Auth::user()->email }}" required disabled>
                    <label for="nohp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Hp</label>
                    <input type="text" id="nohp" name="nohp"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="+62-" required autofocus>
                    <label for="alamat_user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <textarea id="alamat_user" rows="4" name="alamat_user"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Alamat lengkap..."></textarea>
                </div>
                <div class="button p-2">
                    <button type="submit"
                        class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
