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
                    <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            @if($category)
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

            <div class="max-w-xl"> 
            <div class="mt-4">
                <x-input-label for="product_cat_name" :value="__('Category Name:')" />
                <div class="block mt-1 w-full">
                    {{ $category->product_cat_name }}
                </div>
            </div>
                   
            </div>
</div>
            @endif
        </div>
    </div>    
</div>
    
@endsection