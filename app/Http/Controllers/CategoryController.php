<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Article;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $input['name'] = $request->name;
        Category::create($input);
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('admin.Categories.edit',compact('category'));
    }
    public function update(CategoryRequest $request,Category $category)
    {
        $input['name']=$request->name;
        $category->update($input);
        return redirect()->route('category.index');
    }

    public function showCategoryArticles(Category $category)
    {
        $articles = Article::Where('category_id', $category->id)->paginate(6);
        return view('index', compact('articles'));
    }

}
