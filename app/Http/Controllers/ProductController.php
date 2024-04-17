<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) : View
    {
        $products = Product::query();
        

    if ($request->has('search')) {
        $search = $request->input('search');
        $products->where('product_title', 'like', "%$search%")
                ->orWhere('product_description', 'like', "%$search%")
                ->orWhere('product_cat', 'like', "%$search%");
    }

    $products = $products->paginate(10);

    return view('admin.products.index', compact('products'));
    }


    public function create() : View
    {
        $catname = Category::all();
        return view('admin.products.create',compact('catname'));
    }

    public function store(StoreProductRequest $request) : RedirectResponse
    {
        $validatedData = $request->validated();
    
        if ($request->hasFile('product_image')) {
            $imageName = time().'.'.$request->file('product_image')->extension(); 
            $request->product_image->move(public_path('Product-images'), $imageName);
            $validatedData['product_image'] = $imageName;
        }
        try {
            Product::create($validatedData);
            return redirect()->route('admin.products.index')->withSuccess('New product added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withError('Failed to add new product.');
        }
    }
    

 
    public function show(Product $product) : View
    {
        return view('admin.products.show', compact('product'));
    }


    public function edit(Product $product) : View
    {
        $catname = Category::all();
        return view('admin.products.edit', compact('product','catname'));
    }

  
    public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
    {
        $validatedData = $request->validated();
    
        if ($request->hasFile('product_image')) {
            $imageName = time().'.'.$request->file('product_image')->extension(); 
            $request->product_image->move(public_path('Product-images'), $imageName);
            $validatedData['product_image'] = $imageName;
        }
        try {
            $product->update($validatedData);
            return redirect()->back()->withSuccess('Product is updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withError('Failed to add new product.');
        }
    }

  
    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
                ->withSuccess('Product is deleted successfully.');
    }
}
