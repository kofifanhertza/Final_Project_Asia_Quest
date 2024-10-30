@extends('layouts.app')
@section('title', 'Create Items ')
@section('content')
    <div class="max-w-4xl mx-auto px-6"> <!-- Added padding and centered container -->
        {{ Form::open(['route' => 'items.store', 'class' => 'space-y-6']) }}

        <div class="form-group">
            {{ Form::label('name', 'Name：', ['class' => 'block text-gray-700 dark:text-gray-200 font-bold mb-2']) }}
            {{ Form::text('name', null, ['class' => 'form-control block w-full bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg border border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50']) }}
            @if ($errors->first('name'))
                <p class="text-red-500 text-sm mt-1">※{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Description：', ['class' => 'block text-gray-700 dark:text-gray-200 font-bold mb-2']) }}
            {{ Form::text('description', null, ['class' => 'form-control block w-full bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg border border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50']) }}
            @if ($errors->first('description'))
                <p class="text-red-500 text-sm mt-1">※{{ $errors->first('description') }}</p>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('price', 'Price：', ['class' => 'block text-gray-700 dark:text-gray-200 font-bold mb-2']) }}
            {{ Form::number('price', null, ['class' => 'form-control block w-full bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg border border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50']) }}
            @if ($errors->first('price'))
                <p class="text-red-500 text-sm mt-1">※{{ $errors->first('price') }}</p>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('stock_quantity', 'Stock Quantity：', ['class' => 'block text-gray-700 dark:text-gray-200 font-bold mb-2']) }}
            {{ Form::number('stock_quantity', null, ['class' => 'form-control block w-full bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg border border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50']) }}
            @if ($errors->first('stock_quantity'))
                <p class="text-red-500 text-sm mt-1">※{{ $errors->first('stock_quantity') }}</p>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('image_url', 'Image URL：', ['class' => 'block text-gray-700 dark:text-gray-200 font-bold mb-2']) }}
            {{ Form::text('image_url', null, ['class' => 'form-control block w-full bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg border border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50']) }}
            @if ($errors->first('image_url'))
                <p class="text-red-500 text-sm mt-1">※{{ $errors->first('image_url') }}</p>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('category_id', 'Category：', ['class' => 'block text-gray-700 dark:text-gray-200 font-bold mb-2']) }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control block w-full bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg border border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Submit', ['class' => 'w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg']) }}
        </div>

        {{ Form::close() }}
    </div>
@endsection
