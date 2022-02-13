@extends('layouts.admin')
@section('content')
    <div class="d-flex flex-wrap main col-11 ms-auto">

    @foreach($contacts as $contact)
        <div class="card m-2" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$contact->name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$contact->email}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">{{$contact->subject}}</h6>
                <p class="card-text">{{$contact->message}}</p>
            </div>
        </div>

    @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {!! $contacts->links('vendor.pagination.backend') !!}
    </div>
@endsection
