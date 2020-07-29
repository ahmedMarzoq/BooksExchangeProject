<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class WelomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::with('user')->get();
        return view('welcome',['books'=>$books]);
    }
}
