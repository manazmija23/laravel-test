@extends('layouts.master')

@section('content')

    <div class="main">

        <div class="paginate">
            {{ $posts->links() }}
        </div>

        <div class="flex-main">

            <div>
                @foreach($posts as $post)

                    <div class="blog-article">

                        <img class="card-img img-blog" src="/storage/images/{{$post->images}}" alt="">

                        <a href="/blog/{{$post->id}}"><h1>{{$post->headline}}</h1></a>
                        <br>
                        <p>{!! Str_limit($post->content, 300) !!}</p>
                        <a href="/blog/{{$post->id}}">Full Article →</a>
                        <br>
                        <hr>
                       <div class="flex-row d-flex justify-content-between">
                           <div class="flex-row d-flex justify-content-between width-50">
                               <i class="fas fa-thumbs-up"></i>
                               <i class="fas fa-thumbs-down"></i>
                           </div>

                           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#{{$post->id}}">Read Here</button>
                       </div>



                        <div class="published">
                            <span>
                               Published: {{$post->created_at}}
                            </span>
                        </div>


                    </div>

                    <!-- Trigger the modal with a button -->


                        <!-- Modal -->
                        <div id="{{$post->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <a href="/blog/{{$post->id}}"><h2>{{$post->headline}}</h2></a>
                                    </div>
                                    <div class="modal-body">
                                        <img class="card-img img-blog" src="/storage/images/{{$post->images}}" alt="">
                                        <br>
                                        <p class="modal-text">{!! $post->content !!}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                @endforeach
            </div>


            <div class="sidebar">
                <div class="table table-striped sidebar-flex">
                    <h3>Archive</h3>
                    <hr>

                    @foreach($archives as $arch)

                        <a href="/blog?month={{ $arch->created_at->month }}&year={{ $arch->created_at->year }}">
                            {{ date('M', $arch->created_at->timestamp) . " " . date('Y', $arch->created_at->timestamp) }}
                        </a>

                    @endforeach
                </div>
            </div>
        </div>

        <div class="paginate">
            {{ $posts->links() }}
        </div>

    </div>

@endsection