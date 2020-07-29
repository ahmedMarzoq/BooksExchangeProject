<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::with('user')->get();
        $contact = Auth::user()->contact;
        $myBooks = Book::where('owner_id',Auth::id())->get();
        return view('home',['books'=>$books , 'myBooks'=>$myBooks , 'contact'=>$contact ]);
    }
}
