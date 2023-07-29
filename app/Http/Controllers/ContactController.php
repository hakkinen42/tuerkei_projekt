<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
class ContactController extends Controller
{
    public function index()
    {
        $contAll= Contact::all();
        $cont = Contact::orderBy('title','DESC')->paginate(2);
        return view('contact.index')->with(['alle'=>$contAll,'comment'=>$cont]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=> 'required | min:3',
                'mail'=> 'required | min:3',
                'betreff'=> 'required | min:3',
                'nachricht'=> 'required | min:10'
            ]
        );
        $contact = new Contact(
            [
                'name'=> $request['name'],
                'email'=> $request['mail'],
                'reference'=> $request['betreff'],
                'message'=> $request['nachricht'],
                'user_id' => auth()->id()


            ]
        );
        $contact->save();
        return redirect('/contact');
    }

}
