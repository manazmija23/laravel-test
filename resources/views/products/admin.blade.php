@extends('layouts.master')

@section('content')

    <div class="main extended-main ">

        <a class="btn btn-info" href="/products/create/create">Add New</a>

        <div class="products-page">

            @foreach($products as $product)

                <div class="product">

                    <img class="img-fluid img-blog" src={{ 'storage/images/' . $product->images }} alt="">

                    <br>

                    <h2>{{ $product->product_name }}</h2>

                    <br>

                    <p>{!! $product->product_info !!} </p>

                    <form action="{{route('products.destroy', $product->id)}}" method="POST">

                        <input name="_method" type="hidden" value="delete">
                        {{csrf_field()}}
                        <button class="btn-danger btn-lg btn-admin" type="submit">Delete</button>

                    </form>

                </div>

            @endforeach

        </div>
        {{$products->links()}}
    </div>

@endsection