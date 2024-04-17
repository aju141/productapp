@extends('admin.layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="float-start">
                    Product Information
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            @if($product)
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

            <div class="max-w-xl"> 
            <div class="mt-4">
                        <x-input-label for="product_title" :value="__('Title:')" />
                        <div class="block mt-1 w-full">
                            {{ $product->product_title }}
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="product_description" :value="__('Description')" />
                        <div class="block mt-1 w-full">
                            {{ $product->product_description }}
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="product_cat" :value="__('Category')" />
                        <div class="block mt-1 w-full">
                            {{ $product->product_cat }}
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="product_link_url" :value="__('Url')" />
                        <div class="block mt-1 w-full">
                            {{ $product->product_link_url }}
                        </div>
                    </div>

                   <div class="mt-4">
                        <x-input-label for="product_price" :value="__('Price:')" />
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->product_price }}
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="product_image" :value="__('Image:')" />
                        <div class="block mt-1 w-full">
                        <img src="{{ asset('/Product-images') }}/{{ $product->product_image }}" style="width:100px; height:100px;">
                        </div>
                    </div>
            </div>
</div>
            @endif
        </div>
    </div>    
</div>
    
@endsection