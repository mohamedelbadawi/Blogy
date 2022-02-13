@extends('layouts.admin')
<link rel="stylesheet" href="https:/    /cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
@section('content')

    <div class="main col-11">
        @if($errors->any())
            {!! implode('', $errors->all('<span class="text text-danger">:message</span>')) !!}
        @endif
        <div class="card col-11 m-auto ">
            <div class="card-body d-flex ">
                <p><h4>Articles</h4></p>
                <a class="btn btn-primary ms-auto" href="{{route('article.index')}}">Articles</a>
            </div>
        </div>

        <form action="{{route('article.update',[$article->id])}}" method="POST" class=" col-11 m-auto bg-light p-3 mt-4 ms-6 "
              enctype="multipart/form-data">
            @csrf
            <div class="mb-3 ">
                <label class="form-label ">Title</label>
                <input type="text" value="{{$article->title}}" name="title" class="form-control ">
            </div>
            <div class="mb-3 ">
                <label class="form-label ">Description</label>
                <input type="text " name="description" value="{{$article->description}}" class="form-control ">
            </div>
            <div class="mb-3 ">
                <label class="form-label ">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <img src="{{asset('assets/articles/'.$article->image_name)}}">
            <div class="mb-3 ">
                <label for=" " class="form-label">Content</label>
                <label for="summernote"></label><textarea id="summernote" name="content">
{{$article->content}}
            </textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Status</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm " name="status">
                    <option {{ $article->is_published==1?'selected':'' }} value="1">Active</option>
                    <option {{ $article->is_published==0?'selected':'' }} value="0">InActive</option>
                    >
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm " name="category">
                    @foreach($categories as $category)
                        <option {{$article->category_id==$category->id?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row d-flex justify-content-center mt-100">
                <div class="col-md-6"><select id="choices-multiple-remove-button" name="tags[]"
                                              placeholder="Select upto 5 tags   " multiple>
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select></div>
            </div>
            <button class="btn btn-primary" type="submit">update</button>
        </form>

        <script>
            $(document).ready(function () {
                $('#summernote').summernote({
                    height: 150,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                        ['para', ['ol', 'ul', 'paragraph', 'height']],
                        ['insert', ['link']],
                    ]
                });
            });

        </script>

    </div>

@endsection
