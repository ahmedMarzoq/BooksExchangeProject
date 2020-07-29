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
    <form method="POST" action="/contact/">
        @csrf
        <div class="form-group">
            <label for="facebook_url">Facebook</label>
            <input name="facebook_url" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input name="phone_number" type="text" class="form-control">
        </div>
        <!---->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
