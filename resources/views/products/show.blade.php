@extends('layouts.master')




@section('content')


    <div class="main">

        <a href={{'/products'}} >
            <button class="back-btn"><i class="fas fa-angle-double-left"></i>Back</button>
        </a>

        <div class="products-single">
            <h2>{{ $product->product_name}}</h2>
            <hr>

            <div class="flex-main between">

                <div>

                    <img class="product-img-single" src={{asset('/storage/images/' . $product->images)  }} alt="">

                    <hr>

                    <div class="flex-main between">


                        <a href="" data-toggle="modal" data-target="#{{$product->id}}">

                            <img class="img-small" src={{asset('storage/images/' . $product->images2 ) }} alt="">

                        </a>

                        <a href="" data-toggle="modal" data-target="#2">

                            <img class="img-small" src={{asset('storage/images/' . $product->images3 ) }} alt="">

                        </a>

                        <a href="" data-toggle="modal" data-target="#3">

                            <img class="img-small" src={{asset('storage/images/' . $product->images4 ) }} alt="">

                        </a>

                    </div>


                </div>

                <div class="info-single">

                    <h2>Description:</h2>

                    <br>

                    <p>{!! $product->product_info !!}</p>

                    <br>

                    <a href="{{route('cart.edit', $product->id)  }}" class="btn btn-info">Add to Cart</a>

                </div>
            </div>

        </div>

        <div class="number-of-comments">
            <!-- Counting only approved comments -->
            <h4 style="color: dimgrey">{{ $product->pcomments()->where('approved', 0)->count() }}</h4>


            <i style="color: dimgrey" class="fas fa-comment-alt"></i>
            <span style="color: dimgrey">Komentara</span>

        </div>

        @foreach($product->pcomments as $comment)

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



        <div class="comment-form margin-top">

            <h3 style="color: dimgrey">Dodaj Komentar</h3>

            <form action="/products/{{ $product->id }}/comments" method="POST">

                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-6 dimgray">

                        Email:<input class="form-control" type="text" name="email">


                    </div>

                    <div class="col-md-6 dimgray">

                        Name:<input class="form-control" type="text" name="name">

                    </div>
                </div>

                <div class="col-md-12 dimgray textarea-ext">

                    Comment:<textarea class="form-control" type="text" name="body" rows="5"></textarea>

                </div>

                <div class="form-group">

                    <button type="submit" class="btn btn-info btn-block">Add Comment</button>

                </div>

            </form>

        </div>


        
        
    </div>






    <!-- Trigger the modal with a button -->


    <!-- Modal -->
    <div id="{{$product->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <img class="img-blog-full" src="/storage/images/{{$product->images2}}" alt="">

                </div>

            </div>

        </div>
    </div>

    <!-- Modal 2 -->
    <div id="2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <img class="img-blog-full" src="/storage/images/{{$product->images3}}" alt="">

                </div>

            </div>

        </div>
    </div>

    <!-- Modal 3-->
    <div id="3" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <img class="img-blog-full" src="/storage/images/{{$product->images4}}" alt="">

                </div>

            </div>

        </div>
    </div>


    @endsection



