@extends('layouts.main')
@section('content')
    <div class="row tm-row">
        @foreach ($articles as $article)

            <article class="col-12 col-md-6 tm-post">
                <hr class="tm-hr-primary">
                <a href="{{ route('article.show',$article) }}" class="effect-lily tm-post-link tm-pt-60">
                    <div class="tm-post-link-inner">
                        <img src="{{ asset('img/'.$article->image_name) }}" alt="Image" class="img-fluid">
                    </div>
                    @if ($article->is_new())
                        <span class="position-absolute tm-new-badge"> New </span>
                    @endif

                    <h2 class="tm-pt-30 tm-color-primary tm-post-title">{{ $article->title }}</h2>
                </a>
                <p class="tm-pt-30">
                    {{ $article->description }}
                </p>
                <div class="d-flex justify-content-between tm-pt-45">
                    <span class="tm-color-primary">{{ $article->Category->name }}</span>
                    <span class="tm-color-primary">{{ $article->articleDate() }}</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <span>{{ $article->User->name }}</span>
                </div>
            </article>
        @endforeach

    </div>

        {{ $articles->links() }}

@endsection
