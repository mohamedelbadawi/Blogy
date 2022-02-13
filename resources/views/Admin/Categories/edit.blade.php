@extends('layouts.admin')
<link rel="stylesheet" href="https:/    /cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
@section('content')

    <div class="main col-11">
        @if($errors->any())
            {!! implode('', $errors->all('<span class="text text-danger">:message</span>')) !!}
        @endif
        <div class="card col-11 m-auto ">
            <div class="card-body d-flex ">
                <p><h4>Categories</h4></p>
                <a class="btn btn-primary ms-auto" href="{{route('category.index')}}">Categories</a>
            </div>
        </div>

        <form action="{{route('category.update',[$category->id])}}" method="POST" class=" col-11 m-auto bg-light p-3 mt-4 ms-6 "
              enctype="multipart/form-data">
            @csrf
            <div class="mb-3 ">
                <label class="form-label ">Name</label>
                <input type="text" value="{{$category->name}}" name="title" class="form-control ">
            </div>

            <button class="btn btn-primary" type="submit">update</button>
        </form>

    </div>

@endsection
