@extends('layouts.master')

@section('content')

    <div class="main">

        <h2>Sve vase poruke</h2>
        <br>
        <a href={{'/admin'}}>
            <button class="back-btn"><i class="fas fa-angle-double-left"></i>Back</button>
        </a>
        <br>

        @foreach($contacts as $contact)

            <div class="blog-article blog-single">

                <h3>Message from</h3>
                <br>

                <h4> email: {{ $contact->email }}</h4>

                <br>
                <br>

                <p>{{ $contact->message }}</p>

                <br>

                <form action="{{route('contact.destroy', $contact->id)}}" method="POST">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="delete">
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>

            </div>

            @endforeach

            <div class="paginate">
                {{ $contacts->links() }}
            </div>
    </div>

    @endsection