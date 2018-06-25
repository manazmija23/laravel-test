<?php

namespace App\Http\Controllers;

use App\PComment;
use App\Product;
use Illuminate\Http\Request;

class PCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcomments = PComment::latest()->paginate(10);

        return view('products.products-comments', compact('pcomments'));
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
    public function store( Request $request, $product_id )
    {

        $this->validate($request, array(
            'name'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'body'=> 'required|min:2|max:2000'
        ));

        $product = Product::find($product_id);

        $pcomment = new PComment;

        $pcomment->name = $request->name;
        $pcomment->email = $request->email;
        $pcomment->body = $request->body;
        $pcomment->approved = true;
        $pcomment->product()->associate($product);

        $pcomment->save();

        flash()->overlay('Your comment is sent and it is being reviewed by moderator. Thank you! ', 'Comment sent!');

        return back();

    }

    /* This method is for approval of the comments */

    public function approval(Request $request)
    {
        $pcomment = PComment::find($request->id);
        $approveVal = $request->approved;
        if ($approveVal == 'on'){
            $approveVal=0;
        }else{
            $approveVal=1;
        }

        $pcomment->approved = $approveVal;
        $pcomment->save();

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
        $pcomment = PComment::find($id);

        $pcomment->delete();
        return back();
    }
}
