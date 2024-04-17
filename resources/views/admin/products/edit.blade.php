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
                    Edit Product
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl"> 
                <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")


                    <div class="mt-4">
                <x-input-label for="product_title" :value="__('Title')" />
                <x-text-input wire:model="product_title" id="product_title" class="block mt-1 w-full" type="text" name="product_title" required autocomplete="product_title" value="{{ $product->product_title }}"/>
                <x-input-error :messages="$errors->get('product_title')" class="mt-2" />
                </div>


                <div class="mt-4">
                <x-input-label for="product_description" :value="__('Description')" />
                <textarea wire:model="product_description" id="product_description" class="block mt-1 w-full" name="product_description" required autocomplete="product_description">{{ $product->product_title }}</textarea>
                <x-input-error :messages="$errors->get('product_description')" class="mt-2" />
                </div>

                <div class="mt-4">
                <x-input-label for="product_cat" :value="__('Category')" />
                <select wire:model="product_cat" id="product_cat" class="block mt-1 w-full" name="product_cat" required autocomplete="product_cat">
                    <option value="">Select a category</option>
                    @foreach ($catname as $category)
                        <option value="{{ $category->product_cat_name }}" {{ $category->product_cat_name == $product->product_cat ? 'selected' : '' }}>
                            {{ $category->product_cat_name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('product_cat')" class="mt-2" />
            </div>


                <div class="mt-4">
                <x-input-label for="product_link_url" :value="__('Url')" />
                <x-text-input wire:model="product_link_url" id="product_link_url" class="block mt-1 w-full" type="link" name="product_link_url" required autocomplete="product_link_url" value="{{ $product->product_link_url }}"/>
                <x-input-error :messages="$errors->get('product_link_url')" class="mt-2" />
                </div>

                <div class="mt-4">
                <x-input-label for="product_price" :value="__('Price')" />
                <x-text-input step="0.01" wire:model="product_price" id="product_price" class="block mt-1 w-full" type="number" name="product_price" required autocomplete="product_price" value="{{ $product->product_price }}"/>
                <x-input-error :messages="$errors->get('product_price')" class="mt-2" />
                </div>

                <div class="mt-4">
                <x-input-label for="product_image" :value="__('Image')" />
                <x-text-input wire:model="product_image" id="product_image" class="block mt-1 w-full" type="file" name="product_image" required autocomplete="product_image" value="{{ $product->product_image }}"/>
                <x-input-error :messages="$errors->get('product_image')" class="mt-2" />
                <img src="{{ asset('/Product-images') }}/{{ $product->product_image }}" style="width:100px; height:100px;">
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