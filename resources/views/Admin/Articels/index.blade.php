@extends('layouts.admin')
@section('content')
    <div class="main col-11 ">
    <div class="card col-11 m-auto ">
        <div class="card-body d-flex ">
            <p><h4>Articles</h4></p>
            <a class="btn btn-primary ms-auto" href="{{route('article.create')}}">Add Article</a>
        </div>
    </div>
    <table class="table table-hover mt-4 ms-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)

        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$article->title}}</td>
            <td>{{$article->discription}}</td>
            <td>{{$article->status()}}</td>
            <td>
                <div>
                    <a href="{{route('article.edit',[$article->id])}}" class="btn btn-primary"> edit</a>
                    <a href="{{route('article.delete',[$article->id])}}" class="btn btn-danger"> Delete</a>
                    <a href="{{route('article.show',[$article->id])}}" target="_blank" class="btn btn-success"> View</a>
                </div>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
<div class="d-flex justify-content-center">
            {!! $articles->links('vendor.pagination.backend') !!}
</div>

    </div>
@endsection
