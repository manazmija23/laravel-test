@extends('layouts.master')





@section('content')


    <div class="main">


        <h3>Create new Product</h3>

        @foreach($errors->all() as $error)

            <div class="alert alert-danger">
                <li>{{ $error }}</li>
            </div>

        @endforeach

        @include('flash::message')

        <br>
        <a href={{asset('products-dash')}} ><button class="back-btn"><i class="fas fa-angle-double-left"></i>Back</button></a>
        <br><br>
        {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group dimgray">
            {{Form::label('images', 'Cover Image')}}
            {{ Form::file('images') }}
        </div>

        <div class="form-group dimgray">
            {{Form::label('images2', 'Image 2')}}
            {{ Form::file('images2') }}
        </div>

        <div class="form-group dimgray">
            {{Form::label('images3', 'Image 3')}}
            {{ Form::file('images3') }}
        </div>

        <div class="form-group dimgray">
            {{Form::label('images4', 'Image 4')}}
            {{ Form::file('images4') }}
        </div>

        <div class="form-group dimgray">
            {{Form::label('product_name', 'Product name')}}
            {{Form::text('product_name', '', ['class' => 'form-control'])}}
        </div>

        <div class="form-group dimgray">
            {{Form::label('product_price', 'Product price')}}
            {{Form::text('product_price', '', ['class' => 'form-control'])}}
        </div>

        <div class="form-group dimgray">
            {{Form::label('product_info', 'Product Info')}}
            {{Form::textarea('product_info', '', ['id' => 'article-ckeditor',  'class' => 'form-control'])}}

        </div>

        {{Form::submit('Submit', ['class' =>'btn btn-primary '])}}

        {!! Form::close() !!}

    </div>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>




@endsection