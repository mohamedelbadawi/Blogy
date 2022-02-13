@extends('layouts.admin')
@section('content')
    <div class="main col-11 ">
    <div class="card col-11 m-auto ">
        <div class="card-body d-flex ">
            <p><h4>Tags</h4></p>
            <a class="btn btn-primary ms-auto" href="{{route('tag.create')}}">Add Tag</a>
        </div>
    </div>
    <table class="table table-hover mt-4 ms-5">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)

        <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->name}}</td>
            <td>
                <div>
                    <a href="{{route('tag.edit',[$tag->id])}}" class="btn btn-primary"> edit</a>
                    <a href="{{route('tag.delete',[$tag->id])}}" class="btn btn-danger"> Delete</a>
                </div>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
<div class="d-flex justify-content-center">
            {!! $tags->links('vendor.pagination.backend') !!}
</div>

    </div>
@endsection
