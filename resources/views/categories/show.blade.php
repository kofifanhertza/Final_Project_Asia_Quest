@extends('layouts.app')
@section('title', '商品編集')
@section('content')
    <div class="max-w-4xl mx-auto px-6 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">{{ __('Category') }}</h2>

            {{ Form::open(['route' => ['categories.update', $category->id], 'method' => 'put', 'class' => 'space-y-6']) }}

            <div class="form-group">
                {{ Form::label('name', 'Name', ['class' => 'block text-gray-700 dark:text-gray-200 font-bold mb-2']) }}
                {{ Form::label('name', $category->name, ['class' => 'block w-full bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg border border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50']) }}

                @if ($errors->first('name'))
                    <p class="text-red-500 text-sm mt-1">※{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Description', ['class' => 'block text-gray-700 dark:text-gray-200 font-bold mb-2']) }}
                {{ Form::label('description', $category->description, ['class' => 'block w-full bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg border border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50']) }}

                @if ($errors->first('name'))
                    <p class="text-red-500 text-sm mt-1">※{{ $errors->first('name') }}</p>
                @endif
            </div>
            

            <td class="border px-4 py-2">
                {{ link_to_route('categories.edit', 'Edit', ['category' => $category->id], ['class' => 'btn btn-primary']) }}
                {{ Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete', 'class' => 'inline-block']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) }}
                {{ Form::close() }}
            </td>

           


            {{ Form::close() }}
        </div>
    </div>
@endsection
