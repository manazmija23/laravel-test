<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;

class InfoPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(

            'email'=> 'required|email|max:255',
            'message'=> 'required|min:2|max:2000'
        ));

        $contacts = new Contacts;

        $contacts->email = $request->email;
        $contacts->message = $request->message;

        $contacts->save();

        flash()->overlay('Your message is sent. We will reach you in the next 24h! ', 'Thank you!');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $contacts = Contacts::find($id);

        $contacts->delete();

        flash()->overlay('Message is deleted.', 'Warning!');

        return back();
    }


    public function showMessages()
    {

        $contacts = Contacts::latest()->paginate(5);


        return view('messages', compact('contacts'));
    }
}
