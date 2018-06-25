@extends('layouts.master')

@section('content')

    <div class="main">

        <h3>Cart Items</h3>
        <br>

        <table class="table table-hover">

            <thead>

            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Remove item</th>

            </tr>

            </thead>

            <tbody>

            @foreach($cartItems as $cartItem)

                <tr>

                    <td>{{ $cartItem->name }}</td>
                    <td>{{ $cartItem->price }}$</td>
                    <td>{{ $cartItem->qty }}</td>
                    <td>
                            <form action="{{ route('cart.remove', $cartItem->rowId) }}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                            </form>
                    </td>



                </tr>

            @endforeach

            <tr>

                <td></td>
                <td>Total: {{Cart::total()}}$</td>
                <td>Items: {{Cart::count()}}</td>
                <td></td>



            </tr>

            </tbody>

        </table>

        <a href="{{}}" class="btn btn-info">Checkout</a>

    </div>

    @endsection