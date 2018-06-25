@extends('layouts.master')

@section('content')


<div class="main front-page">

    <div class="container">
        <div class="jumbotron">

            <h1 >Welcome</h1>
            <br>
            <p>The best place to learn about photography...Stay informed with the latest news, gear and technology on our blog, featuring guest posts from pro photographers and spotlighting images from the community.</p>
            <a href="/blog" style="color: white;margin-top: 20px" class="btn btn-info">Read More</a>
            <a href="/contact" style="color: white;margin-top: 20px" class="btn btn-secondary">Contact</a>

        </div>

        <img src="/images/camera.png" class="img-fluid mx-auto d-block front-image" alt="">
        
    </div>

</div>

@endsection