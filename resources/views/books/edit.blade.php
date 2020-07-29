@extends('layouts.app')
@section('title','Edit Books')
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
            <li class="breadcrumb-item active" aria-current="page">Edit Book Info</li>
        </ol>
    </nav>
    <form method='POST' action="/books/{{$bookInfo->id}}">
        @csrf
        <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" value="{{$bookInfo->name}}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input name="description" type="text" class="form-control" value="{{$bookInfo->description}}">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input name="category" type="text" class="form-control" value="{{$bookInfo->category}}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input name="status" type="text" class="form-control" value="{{$bookInfo->status}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection