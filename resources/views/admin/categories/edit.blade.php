@extends('admin.layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="float-start">
                    Edit Category
                </div>
                <div class="float-end">
                    <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <!-- product_cat_name -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl"> 
                <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf   categories
                    @method("PUT")

                    <div class="mt-4">
                <x-input-label for="product_cat_name" :value="__('Category Name')" />
                <x-text-input wire:model="product_cat_name" id="product_cat_name" class="block mt-1 w-full" type="text" name="product_cat_name" required autocomplete="product_cat_name" value="{{ $category->product_cat_name }}"/>
                <x-input-error :messages="$errors->get('product_cat_name')" class="mt-2" />
                </div>
                    
                <x-primary-button class="ms-5 mt-4">
                    {{ __('Update') }}
                    </x-primary-button>
                    
                </form>
                </
            </div>
        </div>
    </div>    
</div>
    
@endsection