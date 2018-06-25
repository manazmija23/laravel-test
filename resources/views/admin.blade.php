@extends('layouts.master')

@section('content')

    <div class="main">

        <a class="btn btn-info" href="/admin/create">Add New</a>

        @foreach($posts as $post)

            <div class="blog-article blog-single">
                <img class="img-fluid img-blog" src={{ 'storage/images/' . $post->images }} alt="">
                <h1>{{ $post->headline }}</h1>
                <p>{!! $post->content !!}</p>
                <br>
                <br>
                <div class="flex-button">
                    <form action="{{route('admin.destroy', $post->id)}}" method="POST">
                        <input name="_method" type="hidden" value="delete">
                        {{csrf_field()}}
                        <button class="btn-danger btn-lg" type="submit">Delete</button>
                    </form>

                    <a href="/admin/{{$post->id}}/edit" ><button class="btn-info btn-lg">Edit</button></a>
                </div>

            </div>

        @endforeach
            {{$posts->links()}}
    </div>

@endsection