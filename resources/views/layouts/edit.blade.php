@extends('layouts.master')



@section('content')

    <h1>This is a Update</h1>

    <div class="main">



        {!! Form::open(['action' => ['AdminPostController@update', $posts->id], 'method' => 'POST','enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {{Form::label('images', 'images')}}
            {{ Form::file('images') }}
        </div>

        <div class="form-group">
            {{Form::label('headline', 'Headline')}}
            {{Form::text('headline', $posts->headline, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('content', 'Content')}}
            {{Form::textarea('content', $posts->content, ['id' => 'article-ckeditor',  'class' => 'form-control'])}}
        </div>

        {{Form::hidden('_method', 'PUT')}}

        {{Form::submit('submit', ['class' =>'btn-primary'])}}

        {!! Form::close() !!}

    </div>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>


@endsection