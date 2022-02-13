<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::paginate(10);
        return view('Admin.Articels.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.articels.create', compact('categories', 'tags'));
    }

    public function show(Article $article)
    {
        if ($article->is_published) {
            $relatedArticles = Article::where('id', '!=', $article->id)->where('category_id', $article->category_id)->paginate(4);
            $categories = Category::paginate(5);
            return view('Article', compact('article', 'categories', 'relatedArticles'));
        }

        return redirect()->route('article.index');

    }

    public function search(Request $request)
    {
        $articles = Article::query()
            ->where('title', 'LIKE', $request->text)
            ->paginate(6);
        return view('index', compact('articles'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articels.edit', compact('article','categories','tags'));
    }

    function uploadImage($image, $path, $size, $name)
    {
        $filename = Str::slug($name) . "." . $image->getClientOriginalExtension();
        $path = public_path($path . $filename);
        Image::make($image->getRealPath())->resize($size, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path, 100);

        return $filename;
    }

    public function store(ArticleRequest $request)
    {

        $input['title'] = $request->title;
        $input['description'] = $request->description;
        $input['content'] = $request->content;
        $input['is_published'] = $request->status;
        $input['category_id'] = $request->category;
        $input['user_id'] = auth()->user()->id;
        $input['image_name'] = $this->uploadImage($request->image, 'assets/articles/', 500, $request->image);
        $article = Article::create($input);
        $article->tags()->attach($request->tags);
        Alert::message('Article is published succesfully!');
        return redirect()->route('article.index');


    }

    public function update(ArticleUpdateRequest $request,Article $article)
    {

        $input['title']=$request->title;
        $input['description']=$request->description;
        $input['content']=$request->content;
        $input['category_id']=$request->category;
        $input['is_published']=$request->status;
        if ($request->image_name!=''){
            $input['image_name'] = $this->uploadImage($request->image, 'assets/articles/', 500, $request->image);
        }
        $article->update($input);
        if ($request->tags != null){
            $article->tags()->attach($request->tags);
        }
        alert()->success('Article is updated succesfully!');
        return redirect()->route('article.index');
    }

    public function destroy(Article $article)
    {
        $article->deleteOrFail();
        return redirect()->route('article.index');
    }
}
