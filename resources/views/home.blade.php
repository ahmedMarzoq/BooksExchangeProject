@extends('layouts.app')
@section('title','My profile')
@section('navLinks')
    <a class="dropdown-item" href="/">
        Home
    </a>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>
    @if(isset($contact->id))
        <br><h1>My Contact Info<a class="btn btn-warning float-right" href="contact/{{$contact->id}}/edit"
                                  role="button">Edit</a>
        </h1><br>
        <p>
            Facebook: <a href="{{url($contact->facebook_url)}}">{{$contact->facebook_url}}</a> |
            Phone Number: <a href="tel:{{$contact->phone_number}}">{{$contact->phone_number}}</a>
        </p>
    @else
        <br>
        <h1>My Contact Info<a class="btn btn-primary float-right" href="contact/create" role="button">Add</a></h1>
    @endif

    <hr>
    @if(isset($contact->id))
        <br>
        <h1>My Books
            <small>
                <span class="badge badge-pill badge-info">{{$myBooks->count()}}</span>
            </small>
            <a class="btn btn-primary float-right" href="books/create" role="button">New Book</a>
        </h1>
        <br>
        <div class="row">
            @forelse($myBooks as $book)
                <div class="col-sm-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="books/{{$book->id}}" title="Details">{{$book->name}}</a>
                            </h5>
                            <p class="card-text">{{$book->category}}</p>
                            <form method="POST" action="/books/{{$book->id}}">
                                <a href="books/{{$book->id}}/edit" class="btn btn-warning ">Edit</a>
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                    <br>
                </div>
            @empty
                <div class="col-sm-12">
                    <div class="alert alert-warning " role="alert">
                        You have no Books
                    </div>
                </div>
            @endforelse
        </div>
    @else
        <br><h1 class="inline-headers">My Books<a class="btn btn-primary float-right btn disabled" role="button"
                                                  disabled>New Book</a></h1>
        <small class="text-danger">You have to add your Contant info to enable add book</small><br>
    @endif
    <hr>
    <br>
    <h1>Available Books
        <small>
            <span class="badge badge-pill badge-info">{{$books->count()}}</span>
        </small>
    </h1>
    <br>
    <!-- Table -->
    <table class="table table-md table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">category</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Owner</th>
        </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
            <tr>
                <th scope="row">{{$book->id}}</th>
                <td>
                    <a href="books/{{$book->id}}" title="Details">{{$book->name}}</a>
{{--                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalLong" data-toggle="tooltip" title="Details">{{$book->name}}</button>--}}
                </td>
                <td>{{$book->category}}</td>
                <td>{{$book->description}}</td>
                <td>{{$book->status}}</td>
                @if($book->user->id == Auth::user()->id)
                    <td>{{$book->user->name}} <span class="badge badge-info">Me</span></td>
                @else
                    <td>{{$book->user->name}}</td>
                @endif
            </tr>
        @empty
            <div class="col-sm-12">
                <div class="alert alert-warning " role="alert">
                    There is no Books added
                </div>
            </div>
        @endforelse
        </tbody>
    </table>
    <!-- End Table -->
@endsection
