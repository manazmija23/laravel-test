@extends('layouts.master')

@section('content')

    <div class="main width-1000">

        <h2>Komentari za odobrenje</h2>
        <br>
        <a href={{'/admin'}}>
            <button class="back-btn"><i class="fas fa-angle-double-left"></i>Back</button>
        </a>
        <br>
        <br>
        <table class="table table-striped">

            @foreach($comments as $comment)

                <tr>
                    <th>Comment</th>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->email }}</td>

                    <td class="d-flex flex-row justify-content-around" style="width: 230px">
                        <form action="{{url('toggle-approve')}}" method="POST">
                            {{ csrf_field() }}
                            <input @if ($comment->approved == 0)
                                   {{"checked"}}
                            @endif
                            type="checkbox" name="approved">

                            <input type="hidden" name="id" value="{{ $comment->id }}">
                            <input type="submit" class="btn btn-primary"
                                   value="@if ($comment->approved == 0)
                                             Disapprove
                                            @else
                                              Approve
                                            @endif ">
                        </form>

                        <form action="{{route('comments-dash.destroy', $comment->id)}}" method="POST">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="delete">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>

            @endforeach

        </table>

    </div>

    @endsection