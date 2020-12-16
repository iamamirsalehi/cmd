<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

  
    public function create()
    {
        $categories = Category::getIdAndTitle();

        return view('admin.categories.create', compact('categories'));
    }

   
    public function store(Request $request)
    {
        $data = $request->all();

        Category::create([
            'title'     => $data['categoryTitle'],
            'parent_id' => ($data['categoryParent'] == 0 ) ? null : $data['categoryParent'],
        ]);

        return back()->with('success', 'دسته بندی با موفقیت ایجاد شد');
    }

    
    public function edit(Category $category)
    {
        $categories = Category::getIdAndTitle();

        return view('admin.categories.edit', compact('categories', 'category'));
    }

   
    public function update(Request $request, Category $category)
    {
        $data = $request->all();

        $category->update([
            'title'     => $data['categoryTitle'],
            'parent_id' => ($data['categoryParent'] == 0 ) ? null : $data['categoryParent'],
        ]);

        return back()->with('success', 'دسته بندی با موفقیت بروزرسانی شد');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'دسته بندی با موفقیت حذف شد');
    }
}
