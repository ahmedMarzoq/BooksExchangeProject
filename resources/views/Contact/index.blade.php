@extends('layouts.app')
@section('content')

    <div class="container">
        <form method="POST" action="/contact">
            @if($contact)
                {{$contact->phone_number}}
            @endif
            @csrf
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input name="phone_number" type="tel" class="form-control" id="phone"
                       placeholder="{{$contact->phone_number}}">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook URL</label>
                <input name="facebook" type="text" class="form-control" id="facebook"
                       placeholder="{{$contact->facebook_url}}">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

@endsection
