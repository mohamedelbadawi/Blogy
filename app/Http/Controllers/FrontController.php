<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(6);
        return view('index', compact('articles'));
    }

    public function show(Article $article)
    {
        if ($article->is_published){
            $relatedArticles = Article::where('id', '!=', $article->id)->where('category_id', $article->category_id)->paginate(4);
            $categories = Category::paginate(5);
            return view('Article', compact('article', 'categories', 'relatedArticles'));
        }
        else{
            return redirect()->route('article.index');
        }

    }
    public function search(Request $request)
    {
        $articles = Article::query()
            ->where('title', 'LIKE', $request->text)
            ->paginate(6);
        return view('index', compact('articles'));
    }
}
