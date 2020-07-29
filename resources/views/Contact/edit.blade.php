@extends('layouts.app')
@section('title','Contact Info')
@section('navLinks')
    <a class="dropdown-item" href="/">
        Home
    </a>
    <a class="dropdown-item" href="/home">
        My profile
    </a>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/home">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Contact Info</li>
        </ol>
    </nav>
    <form method="POST" action="/contact/{{$contactInfo->id}}">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
            <label for="facebook_url">Facebook</label>
            <input name="facebook_url" type="text" class="form-control" value="{{$contactInfo->facebook_url}}" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number <small>'059000000'</small></label>
            <input name="phone_number" type="tel" pattern="059[0-9]{7}" maxlength="10" class="form-control" value="{{$contactInfo->phone_number}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
