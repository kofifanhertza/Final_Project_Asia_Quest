@extends('layouts.app')
@section('title', 'Stores')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ link_to_route('stores.create', 'Create Stores', [], ['class' => 'btn btn-primary']) }}
                </div>
            </div>

            <br>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full text-left dark:text-gray-100">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Number of Products</th>



                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stores as $store)
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <td class="border px-4 py-2">{{ link_to_route('stores.show', $store->id, ['store' => $store->id]) }}</td>
                                <td class="border px-4 py-2">{{ $store->name }}</td>
                                <td class="border px-4 py-2">{{ $store->description }}</td>
                                <td class="border px-4 py-2">{{ $store->products_count }}</td>  
                            </tr>
                            
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script>
        function openPopup() {
            document.getElementById('popup').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('popup').classList.add('hidden');
        }
    </script>
@endsection
