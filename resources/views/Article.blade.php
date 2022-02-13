@extends('layouts.main')
@section('content')
    <div class="row tm-row">
        <div class="col-12">
            <hr class="tm-hr-primary tm-mb-55">

            <img src="{{ asset('assets/articles/'.$article->image_name) }}" alt="" height="535" width="954">
        </div>
    </div>
    <div class="row tm-row">
        <div class="col-lg-8 tm-post-col">
            <div class="tm-post-full">
                <div class="mb-4">
                    <h2 class="pt-2 tm-color-primary tm-post-title">{{ $article->title }}</h2>
                    <p class="tm-mb-40">{{ $article->articleDate() }} posted by {{ $article->User->name }}</p>
                    <p>
                        {{ $article->content }}
                    </p>
                    <span class="d-block text-right tm-color-primary">
                        @foreach ($article->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                    </span>
                </div>


            </div>
        </div>
        <aside class="col-lg-4 tm-aside-col">
            <div class="tm-post-sidebar">
                <hr class="mb-3 tm-hr-primary">
                <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                <ul class="tm-mb-75 pl-5 tm-category-list">
                    @foreach ($categories as $category)
                        <li><a href="{{ route('category.show',$category) }}" class="tm-color-primary">{{ $category->name }}</a></li>
                    @endforeach

                </ul>
                <hr class="mb-3 tm-hr-primary">

                <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>
                @foreach ($relatedArticles as $article)

                    <a href="{{ route('article.show', $article) }}" class="d-block tm-mb-40">
                        <figure>
                            <img src="{{ asset('assets/articles/'.$article->image_name) }}" alt="Image" class="mb-2 img-fluid">
                            <figcaption class="tm-color-primary">{{ $article->title }}</figcaption>
                        </figure>
                    </a>
                @endforeach

            </div>
        </aside>
    </div>
@endsection
