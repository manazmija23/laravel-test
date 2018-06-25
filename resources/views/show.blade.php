@extends('layouts.master')


@section('content')

    <div class="main">

        @include('flash::message')

        <a href={{'/blog'}}>
            <button class="back-btn"><i class="fas fa-angle-double-left"></i>Back</button>
        </a>

        <div class="blog-article blog-single">

            <img class="img-blog-full" src={{asset('/storage/images/' . $posts->images)  }} alt="">
            <h1>{{$posts->headline}}</h1>
            <br>
            <p>{!! $posts->content !!}</p>
            <hr>

            <div class="published">
                <span>
                   Published: {{$posts->created_at}}
                </span>
            </div>

        </div>

        <div class="number-of-comments">
            <!-- Counting only approved comments -->
                    <h4 style="color: dimgrey">{{ $posts->comments()->where('approved', 0)->count() }}</h4>


            <i style="color: dimgrey" class="fas fa-comment-alt"></i>
            <span style="color: dimgrey">Komentara</span>

        </div>

        @foreach($posts->comments as $comment)

            @if($comment->approved =='0')

            <div class="comment">

                <img src={{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?d=mm"/* default gravatar ext */ }}
                     alt="" class="author-image">

                <div class="author-right-side">

                    <h4>{{ $comment->name }}</h4>

                    <span class="time">{{ $comment->created_at->diffForHumans() }}</span>

                    <p class="author-comment">{!! $comment->comment !!} </p>

                </div>

            </div>
            @endif

        @endforeach

        <div class="row" style="margin-top: 15px">

            <div class="comment-form">
                {{ Form::open(['route' => ['comments.store', $posts->id], 'method' => 'POST']) }}

                <h3 style="color: dimgrey">Dodaj Komentar</h3>

                <div class="row">

                    <div class="col-md-6 dimgray">
                        {{ Form::label('name', "Name:") }}
                        {{ Form::text('name', null, ['class' => 'form-control'] )}}
                    </div>

                    <div class="col-md-6 dimgray">
                        {{ Form::label('email', "Email:") }}
                        {{ Form::text('email', null, ['class' => 'form-control'] )}}
                    </div>

                    <div class="col-md-12 dimgray">
                        {{ Form::label('comment', "Comment:") }}
                        {{ Form::textarea('comment', null, ['class' => 'form-control','id' => 'summernote','rows' => '5', ] )}}

                        <br>

                        {{ Form::submit('Add Comment', ['class' => 'btn btn-info btn-block']) }}
                    </div>

                </div>

                {{ Form::close() }}
            </div>
        </div>

    </div>

@endsection