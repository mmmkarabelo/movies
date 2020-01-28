@extends('layouts.app')

@section('content')
@if(!Auth::guest())
<div class="shadow p-3 mb-5 bg-white rounded">
    <a href="/movies" class="btn btn-secondary" role="button">Go Back</a>
    <hr>
    <h3>{{$movie->title}}</h3>
    <div>
       Movie Title: {{$movie->title}}
    </div>
    <div>
       Movie Duration: {{$movie->duration}} Min
    </div>
    <div>
       Movie Rating: {{$movie->rating}}
    </div>

    <hr>
    <small>Created on {{$movie->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id ==$movie ->user_id)
            <a href="/movies/{{$movie->movie_id}}/edit"  class="btn btn-secondary">Edit</a>
            
            {!!Form::open(['action' => ['MoviesController@destroy' , $movie->movie_id], 'method' => 'movie' , 'class' => 'float-right'])!!}
                {{Form::hidden('_method' , 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
    </div>
    @endif
@endsection 