@extends('layouts.admin')
@section('content')
    <div class="main col-11 ">
    <div class="card col-11 m-auto ">
        <div class="card-body d-flex ">
            <p><h4>Categories</h4></p>
            <a class="btn btn-primary ms-auto" href="{{route('category.create')}}">Add Category</a>
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
        @foreach($categories as $category)

        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>
                <div>
                    <a href="{{route('category.edit',[$category->id])}}" class="btn btn-primary"> edit</a>
                    <a href="{{route('category.delete',[$category->id])}}" class="btn btn-danger"> Delete</a>
                    <a href="{{route('category.show',[$category->id])}}" target="_blank" class="btn btn-success"> View</a>
                </div>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
<div class="d-flex justify-content-center">
            {!! $categories->links('vendor.pagination.backend') !!}
</div>

    </div>
@endsection
