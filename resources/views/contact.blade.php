@extends('layouts.master')




@section('content')

    <div class="main">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <li>{{ $error }}</li>
            </div>
        @endforeach
        <i id="flex-center" class="fas fa-envelope fa-5x"></i>


        <br>
        <br>
        <br>
        <br>

        <div class="container">

            <h2 style="color: dimgrey">Contact Us</h2>
            <br>
            <form action="/contact" method="POST">

                {{ csrf_field() }}
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" id="" cols="30" rows="10" placeholder="Your message"></textarea>
                </div>

              <!--  {!! Captcha::display() !!} -->
                <br>
                <button type="submit" class="btn btn-info">Submit</button>


            </form>
        </div>



    </div>

    @endsection