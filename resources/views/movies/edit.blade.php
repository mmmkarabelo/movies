@extends('layouts.app')

@section('content')
@if(!Auth::guest())
<div class="shadow p-3 mb-5 bg-white rounded">
    <h3>Edit Movies</h3>

    {!! Form::open(['action' => ['MoviesController@update', $movie->movie_id] , 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title' , 'Movie Title')}}
            {{Form::text('title' , $movie->title , ['class' => 'form-control' , 'placeholder' => 'Movie Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('duration' , 'Duration (min)')}}
            {{Form::text('duration' , $movie->duration , ['class' => 'form-control' , 'placeholder' => 'Duration'])}}
        </div>
        <div class="form-group">
            {{Form::label('rating' , 'Rating')}}
            {{Form::select('rating' ,['G' => 'General Admission', 'PG' => 'Parental Guidance', 'PG-13' => 'Parents Strongly Cautioned', 'R' => 'Restricted', 'NC-17' => 'Adults Only', 'Unrated' => 'Unrated', 'Not Rated' => 'Not Rated'],[$movie->rating], ['class' => 'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit' ,['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
  </div>
  @endif
@endsection