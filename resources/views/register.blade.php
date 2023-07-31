@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="container">
        <div class="justify-center" style="display: flex; justify-content: center; margin-top: 6rem; margin-bottom: 4rem">
            <div
                class="w-full max-w-sm  p-6 bg-yellow-200 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
                <form class="space-y-3" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h5 class="text-xl font-medium text-gray-900 dark:text-white">Register account now</h5>
                    <div>
                        <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            Name</label>
                        <input id="nama_lengkap" type="text"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white @error('nama_lengkap') is-invalid @enderror"
                            name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autocomplete="nama_lengkap" autofocus>

                        @error('nama_lengkap')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            Email </label>
                        <input type="email" name="email" id="email"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="email@example.com" required>
                        <input type="text" hidden name="role_id" value="2" id="role_id">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            confirm
                            password</label>
                        {{-- <input type="password" name="password" id="password-confirm" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required> --}}
                        <input id="password-confirm" type="password"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            name="password_confirmation" placeholder="••••••••" required autocomplete="new-password">
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Register
                        Now</button>
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                        Have an account? <a href="{{ route('login') }}"
                            class="text-blue-700 hover:underline dark:text-blue-500">Login now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
