@extends('layouts.app')
@section('title', 'Products')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ link_to_route('products.create', 'Create Product', [], ['class' => 'btn btn-primary']) }}
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
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Stock</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <td class="border px-4 py-2">{{ link_to_route('products.show', $product->id, ['product' => $product->id]) }}</td>
                                <td class="border px-4 py-2">{{ $product->name }}</td>
                                <td class="border px-4 py-2">{{ $product->price }}</td>
                                <td class="border px-4 py-2">{{ $product->stock }}</td>

                                <td class="border px-4 py-2">
                                    {{ Form::open(['route' => ['products.addStock', $product->id], 'method' => 'patch', 'class' => 'inline-block']) }}
                                    {{ Form::submit('Add Stock', ['class' => 'btn btn-sm btn-primary']) }}
                                    {{ Form::close() }}

                                    {{ Form::open(['route' => ['products.removeStock', $product->id], 'method' => 'patch', 'class' => 'inline-block']) }}
                                    {{ Form::submit('Remove Stock', ['class' => 'btn btn-sm btn-danger']) }}
                                    {{ Form::close() }}

                                    <button onclick="openPopup()" class="btn btn-sm btn-secondary">Bulk Update</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup Modal -->
    <div id="popup" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 backdrop-blur-sm flex items-center justify-center">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Bulk Update</h2>
            <p class="mb-4 text-gray-600 dark:text-gray-300">Enter the quantity you want to add or remove for all products in bulk.</p>
            
            <!-- Example form inside popup -->
            {{ Form::open(['route' => ['products.bulkUpdate', $product->id], 'method' => 'patch', 'class' => 'inline-block']) }}
            {{ Form::number('stock', null, ['class' => 'block w-full bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg border border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50']) }}  
            {{ Form::submit('Add Stock', ['class' => 'btn btn-sm btn-primary']) }}
            {{ Form::close() }}


            <!-- Close button -->
            <button onclick="closePopup()" class="mt-4 w-full text-center text-gray-500 hover:text-gray-700">Close</button>

        </div>
    </div>

    <style>
        /* Add a blur effect to the background when the popup is open */
        .backdrop-blur-sm {
            backdrop-filter: blur(5px);
        }

        /* Button styles for primary, secondary, and danger buttons */
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 0.375rem;
            text-align: center;
        }
        .btn-primary {
            background-color: #3490dc;
            color: white;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-danger {
            background-color: #e3342f;
            color: white;
        }
        .btn-primary:hover {
            background-color: #2779bd;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .btn-danger:hover {
            background-color: #cc1f1a;
        }
    </style>

    <script>
        function openPopup() {
            document.getElementById('popup').classList.remove('hidden');
        }

        function closePopup() {
            document.getElementById('popup').classList.add('hidden');
        }
    </script>
@endsection
