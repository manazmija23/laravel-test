@extends('layouts.master')



@section('content')

    <div class="main extended-main ">



        <div class="products-page">

            @foreach($products as $product)

                <div class="product">

                    <img class="img-fluid img-blog" src={{ 'storage/images/' . $product->images }} alt="">

                    <br>
                    <a href="/products/{{ $product->id }}">

                        <h2>{{ $product->product_name }}</h2>

                    </a>
                    <hr>
                    <br>

                    <p>{!! Str_limit($product->product_info, 150) !!} </p>

                    <hr>
                    <br>
                    <br>
                    <br>

                    <div class="flex-main bottom-price">

                        <h4>Price: {!! $product->product_price !!} $</h4>

                        <a href="{{route('cart.edit', $product->id)  }}" class="btn btn-info">Add to Cart</a>

                    </div>


                </div>

            @endforeach

        </div>
        {{$products->links()}}
    </div>

@endsection