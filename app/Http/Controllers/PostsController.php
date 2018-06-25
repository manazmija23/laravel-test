<?php

namespace App\Http\Controllers;

use App\PostsModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PostsModel $postsModel)
    {

        $model = PostsModel::latest();

        if($request->has('year')) {

            $model->whereYear('created_at', (int)$request->get('year'));

        }

        if ($request->has('month')) {

            $model->whereMonth('created_at', (int)$request->get('month'));
        }

        $posts = $model->paginate(5);

        $archives = $postsModel->select('created_at')->groupBy('created_at')->orderBy('created_at', 'DESC')->get();

        return view('blog', compact('posts', 'archives'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $posts = PostsModel::find($id);

        return view('show', compact('posts'));
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
        //
    }

}
