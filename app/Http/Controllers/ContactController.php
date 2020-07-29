<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use App\User;

class ContactController extends Controller
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
     * @return \Illuminate\Http\Rx`esponse
     */
    public function create()
    {
        return view('contact/create');
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
            'facebook_url' => 'required',
            'phone_number' =>'required|numeric'
        ]);
        $contact = Contact::firstOrCreate(
            ['user_id' => Auth::id()],
            ['facebook_url' => $request->input("facebook_url"),
                'phone_number' => $request->input("phone_number")]
        );
        $contact->user_id = Auth::id();
        $contact->save();
        return redirect("/home")->with('success','Contact Info added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/home')->with('error','You are not authorized');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        if (isset($contact)){
            if ($contact->user->id != Auth::id()){
                return redirect('/home')->with('error','You are not authorized');
            }
        }else{
            return redirect('/home')->with('error','You are not authorized');
        }
        return view('Contact.edit',['contactInfo'=>$contact ]);
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
        $contact = Contact::find($id);
        if (isset($contact)){
            if ($contact->user->id != Auth::id()){
                return redirect('/home')->with('error','You are not authorized');
            }
        }else{
            return redirect('/home')->with('error','You are not authorized');
        }
        $this->validate($request,[
            'facebook_url' => 'required',
            'phone_number' =>'required|numeric'
        ]);
        $contact = Contact::find($id);
        $contact->facebook_url = $request->input("facebook_url");
        $contact->phone_number = $request->input("phone_number");
        $contact->save();
        return redirect('/home')->with('success','Contact Info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
