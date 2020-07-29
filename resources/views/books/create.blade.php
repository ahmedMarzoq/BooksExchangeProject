@extends('layouts.app')
@section('title','Books')
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
            <li class="breadcrumb-item active" aria-current="page">Add New Book</li>
        </ol>
    </nav>
    <div class="container">
        <form method="POST" action="/books">
            @csrf
            <div class="form-group">
                <label for="name">Book name</label>
                <input name="name" type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input name="category" type="text" class="form-control" id="category">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input name="status" type="text" class="form-control" id="status" >
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
