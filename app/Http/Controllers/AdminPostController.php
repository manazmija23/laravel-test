<?php

namespace App\Http\Controllers;

use App\PostsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $posts = PostsModel::latest()->paginate(5);

        return view('admin', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(), [
            'headline' => 'required',
            'content' => 'required',
        ]);

        $posts = new PostsModel;

        $posts->headline = request('headline');
        $posts->content = request('content');

      // Handle file upload

        if($request->hasFile('images')){
            // Get file name with extension
            $fileNameWithExt = $request->file('images')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('images')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename. '_' .time(). '.' .$extension;
            // Upload image
            $path = $request->file('images')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }


        $posts->images = $fileNameToStore;
        $posts->save();


        flash()->overlay('Your post is added!', 'Thank you!');

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
        $posts = PostsModel::find($id);

        return view('layouts.edit')->with('posts', $posts);
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

        $posts = PostsModel::find($id);

        $posts->headline = $request->input('headline');
        $posts->content = $request->input('content');

        // Handle file upload

        if($request->hasFile('images')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('images')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('images')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload image
            $path = $request->file('images')->storeAs('public/images', $fileNameToStore);
        }

        if($request->hasFile('images')){
            $posts->images = $fileNameToStore;
        }
        $posts->save();

        flash()->overlay('Post is updated.', 'Thank you!');

        return redirect('/admin');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $posts = PostsModel::find($id);

        if($posts->images != 'noimage.jpg'){
            //Delete image from folder storage/images
            Storage::delete('public/images/'.$posts->images);
        }

        $posts->delete();


        flash()->overlay('Post is deleted.', 'Warning!');


        return back();
    }
}
