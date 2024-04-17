<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request) : View
    {
        $categories = Category::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $categories->where('product_title', 'like', "%$search%");
        }
    
        $categories = $categories->paginate(10);
    
        return view('admin.categories.index', compact('categories'));



    }

  
    public function create() : View
    {
        return view('admin.categories.create');
    }

 
    public function store(StoreCategoryRequest $request) : RedirectResponse
    {
        Category::create($request->validated());

        return redirect()->route('categories.index')
                ->withSuccess('New category is added successfully.');
    }

   
    public function show(Category $category) : View
    {
        return view('admin.categories.show', compact('category'));
    }

 
    public function edit(Category $category) : View
    {
        return view('admin.categories.edit', compact('category'));
    }

   
    public function update(UpdateCategoryRequest $request, Category $category) : RedirectResponse
    {
        $category->update($request->validated());

        return redirect()->back()
                ->withSuccess('Pategory is updated successfully.');
    }

  
    public function destroy(Category $category) : RedirectResponse
    {
        $category->delete();

        return redirect()->route('admin.categories.index')
                ->withSuccess('Category is deleted successfully.');
    }
}
