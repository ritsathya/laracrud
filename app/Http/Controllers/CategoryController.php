<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $categories = Category::paginate(5);
        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name|max:255',
        ]);

        $request->user()->categories()->create([
            'name' => $request->name
        ]);

        return back();
    }

    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $name = $this->validate($request, [
            'name' => 'required|unique:categories,name|max:255'
        ]);

        $category->update($name);
        return redirect()->route('category');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }

}
