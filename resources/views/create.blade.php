@extends('layouts.master')

@section('content')

    <div class="main">

            @foreach($errors->all() as $error)

            <div class="alert alert-danger">
                <li>{{ $error }}</li>
            </div>

            @endforeach

                @include('flash::message')

        <h3>Create new post!</h3>
        <br>
                <a href={{asset('admin')}} ><button class="back-btn"><i class="fas fa-angle-double-left"></i>Back</button></a>
        <br><br>
        {!! Form::open(['action' => 'AdminPostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group dimgray">
            {{Form::label('images', 'Images')}}
            {{ Form::file('images') }}
        </div>

        <div class="form-group dimgray">
            {{Form::label('headline', 'Headline')}}
            {{Form::text('headline', '', ['class' => 'form-control'])}}
        </div>

        <div class="form-group dimgray">
            {{Form::label('content', 'Content')}}
            {{Form::textarea('content', '', ['id' => 'article-ckeditor',  'class' => 'form-control'])}}

        </div>

        {{Form::submit('Submit', ['class' =>'btn btn-primary '])}}

        {!! Form::close() !!}

    </div>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>




@endsection