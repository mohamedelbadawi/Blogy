<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
     $tags=Tag::paginate(10);
     return view('admin.tags.index',compact('tags'));
    }
    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(TagRequest $request)
    {
        $input['name']=$request->name;
        Tag::create($input);
        return redirect()->route('tag.index');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }

    public function update(TagRequest $request , Tag $tag)
    {
        $input['name']=$request->name;
        $tag->update($input);
        return redirect()->route('tag.index');
    }
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
