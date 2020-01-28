@extends('layouts.app')

@section('content')
@if(!Auth::guest())
<div class="shadow p-3 mb-5 bg-white rounded">
    <h3 style="color:navy">Movies Collection</h3>

    @if(count($movies) > 0)
        <ul class="list-group">
            @foreach ($movies as $movie)
             <li class="list-group-item">
                 <div class="well">
                 <h3><a href="/movies/{{$movie->movie_id}}">{{$movie->title}}</a></h3>
                    <small>Created on {{$movie->created_at}}</small>
                </div>
             </li>
                
            @endforeach
            {{$movies->links()}}
        </ul>
    @else
        <p>No movies found</p>
    @endif
    </div>
    @endif
@endsection