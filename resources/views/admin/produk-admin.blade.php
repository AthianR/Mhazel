@extends('layouts.admin')
@section('title', 'Produk Admin')
@section('content')
    <div class="container">
        <div class="pb-4 pt-4">
            <div class="p-2 border-2 border-gray-900 border-dashed rounded-lg dark:border-gray-700">
                @if (session('success'))
                    <div id="alert-success" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div id="alert-error" class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex items-center justify-between pb-4 p-4 bg-white dark:bg-gray-900">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <livewire:search-bar />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
