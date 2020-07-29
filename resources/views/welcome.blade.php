@extends('layouts.app')
@section('title','Home')
@section('navLinks')
    <a class="dropdown-item" href="home">
        My Profile
    </a>
@endsection

@section('content')
    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('Slider/1.jpg')}}" class="d-block w-100 h-75" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>“So many books, so little time.” </h5>
                    <p>― Frank Zappa</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('Slider/2.jpg')}}"class="d-block w-100 h-75" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>“A room without books is like a body without a soul.” </h5>
                    <p>― Marcus Tullius Cicero</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('Slider/3.jpg')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>“Good friends, good books, and a sleepy conscience: this is the ideal life.” </h5>
                    <p>― Mark Twain</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- EndSlider -->


    <br><h1 class="text-center">Available Books</h1>
    @guest
        <p class="text-center text-danger">You have to sign in to see Book details</p>
    @endguest
    <!-- Table -->
    <table class="table table-md">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">category</th>
            <th scope="col">owner</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <th scope="row">{{$book->id}}</th>
                <td>{{$book->name}}</td>
                <td>{{$book->category}}</td>
                <td>{{$book->user->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- End Table -->
@endsection



