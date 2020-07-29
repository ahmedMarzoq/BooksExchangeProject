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
            <li class="breadcrumb-item active" aria-current="page">Book Details</li>
        </ol>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-header bg-secondary">
                <strong class="text-light">Owner Information</strong>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>
                        <strong>Name : </strong>{{$user}}
                        <br><strong>Facebook : </strong><a href="{{url($contact->facebook_url)}}">{{$contact->facebook_url}}</a>
                        <br><strong>Mobile Number : </strong><a href="tel:{{$contact->phone_number}}">{{$contact->phone_number}}</a>
                    </p>
                </blockquote>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header bg-secondary">
                <strong class="text-light">Book Details</strong>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>
                        <strong>Name : </strong>{{$book->name}}<br>
                        <strong>Category : </strong>{{$book->category}}<br>
                        <strong>Status : </strong>{{$book->status}}<br>
                        <strong>Description : </strong>{{$book->description}}
                    </p>
                </blockquote>
            </div>
        </div>
    </div>
@endsection
