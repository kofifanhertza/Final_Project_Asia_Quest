@extends('layouts.app')
@section('title', '商品編集')
@section('content')
    <div class="max-w-4xl mx-auto px-6 py-12"> <!-- Container with padding and centering -->
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">{{ __('Edit Category') }}</h2>

            {{ Form::open(['route' => ['categories.update', $category->id], 'method' => 'put', 'class' => 'space-y-6']) }}

            <div class="form-group">
                {{ Form::label('name', 'Name：', ['class' => 'block text-gray-700 dark:text-gray-200 font-bold mb-2']) }}
                {{ Form::text('name', $category->name, ['class' => 'block w-full bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg border border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50']) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Description', ['class' => 'block text-gray-700 dark:text-gray-200 font-bold mb-2']) }}
                {{ Form::text('description', $category->description, ['class' => 'block w-full bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg border border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Submit', ['class' => 'w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg']) }}
            </div>

            

            {{ Form::close() }}
        </div>
    </div>
@endsection
