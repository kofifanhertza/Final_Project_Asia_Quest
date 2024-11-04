@extends('layouts.app')
@section('title', '商品登録')
@section('content')
    <div class="max-w-4xl mx-auto px-6 py-12">
        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">{{ __('Register Category') }}</h2>

            {{ Form::open(['route' => 'categories.store', 'class' => 'space-y-6']) }}

            <div class="form-group">
                {{ Form::label('name', 'Name：', ['class' => 'block text-gray-700 dark:text-gray-200 font-bold mb-2']) }}
                {{ Form::text('name', null, ['class' => 'block w-full bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg border border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50']) }}

                @if ($errors->first('name'))
                    <p class="text-red-500 text-sm mt-1">※{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Description', ['class' => 'block text-gray-700 dark:text-gray-200 font-bold mb-2']) }}
                {{ Form::text('description', null, ['class' => 'block w-full bg-gray-100 dark:bg-gray-700 dark:text-gray-100 rounded-lg border border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50']) }}

                @if ($errors->first('description'))
                    <p class="text-red-500 text-sm mt-1">※{{ $errors->first('description') }}</p>
                @endif
            </div>
            <div class="form-group">
                {{ Form::submit('Submit', ['class' => 'w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg']) }}
            </div>

            {{ Form::close() }}
        </div>
    </div>
@endsection
