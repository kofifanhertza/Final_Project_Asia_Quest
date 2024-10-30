@extends('layouts.app')
@section('title', 'Items')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ link_to_route('items.create', 'Create Items', [], ['class' => 'btn btn-primary']) }}
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
                            <th class="px-4 py-2">Category</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Stock Quantity</th>
                            <th class="px-4 py-2">Image URL</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <td class="border px-4 py-2">{{ link_to_route('items.show', $item->id, ['item' => $item->id]) }}</td>
                                <td class="border px-4 py-2">{{ $item->name }}</td>
                                <td class="border px-4 py-2">{{ $item->category->name }}</td>
                                <td class="border px-4 py-2">{{ $item->description }}</td>
                                <td class="border px-4 py-2">{{ $item->price }}</td>
                                <td class="border px-4 py-2">{{ $item->stock_quantity }}</td>
                                <td class="border px-4 py-2">{{ $item->image_url }}</td>
                                <td class="border px-4 py-2">
                                    {{ link_to_route('items.edit', 'Edit', ['item' => $item->id], ['class' => 'btn btn-primary']) }}
                                    {{ Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete', 'class' => 'inline-block']) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
