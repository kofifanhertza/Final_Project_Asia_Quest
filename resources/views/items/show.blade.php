@extends('layouts.app')
@section('title', '商品詳細')
@section('content')
    <div class="max-w-4xl mx-auto px-6 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ __('ITEM DETAILS') }}</h2>

            <div class="grid grid-cols-1 gap-4 text-gray-900 dark:text-gray-100">
                <p><strong>ID:</strong> {{ $item->id }}</p>
                <p><strong>Name:</strong> {{ $item->name }}</p>
                <p><strong>Description:</strong> {{ $item->description }}</p>
                <p><strong>Price:</strong> {{ $item->price }}</p>
                <p><strong>Stock Quantity:</strong> {{ $item->stock_quantity }}</p>
                <p><strong>Image URL:</strong> {{ $item->image_url }}</p>
                <p><strong>Created at:</strong> {{ $item->created_at }}</p>
                <p><strong>Updated at:</strong> {{ $item->updated_at }}</p>
            </div>
        </div>
    </div>
@endsection
