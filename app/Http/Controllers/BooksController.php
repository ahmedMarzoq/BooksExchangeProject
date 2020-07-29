<?php

namespace App\Http\Controllers;

use App\Contact;
use App\User;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books/create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' =>'required',
            'category' =>'required',
            'status' =>'required'
        ]);
        $book = new Book();
        $book->name = $request->input("name");
        $book->description = $request->input("description");
        $book->category = $request->input("category");
        $book->status = $request->input("status");
        $user = Auth::user();
        $user->books()->save($book);
        return redirect('/home')->with('success','Book added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        if(isset($book)){
            $user = User::find($book->owner_id);
            $contact = Contact::where('user_id', $book->owner_id)->first();
            return view('/books/index',['book'=>$book,'contact'=>$contact,'user'=>$user->name]);
        }else{
            return redirect('/home')->with('error','There is no books with that ID');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        if(isset($book)){
            if ($book->user->id != Auth::id()){
                return redirect('/home')->with('error','You are not authorized');
            }
        }else{
            return redirect('/home')->with('error','You are not authorized');
        }
        return view('books.edit',['bookInfo'=>$book ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' =>'required',
            'category' =>'required',
            'status' =>'required'
        ]);
        $book = Book::find($id);
        if(isset($book)){
            if ($book->user->id != Auth::id()){
                return redirect('/home')->with('error','You are not authorized');
            }
        }else{
            return redirect('/home')->with('error','You are not authorized');
        }
        $book->name = $request->input("name");
        $book->description = $request->input("description");
        $book->category = $request->input("category");
        $book->status = $request->input("status");
        $user = Auth::user();
        $user->books()->saveMany([$book]);
        return redirect('/home')->with('success','Book updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if(isset($book)){
            if ($book->user->id != Auth::id()){
                return redirect('/home')->with('error','You are not authorized');
            }
        }else{
            return redirect('/home')->with('error','You are not authorized');
        }
        Book::destroy($id);
        return redirect('/home')->with('success','Book Deleted successfully');
    }
}
