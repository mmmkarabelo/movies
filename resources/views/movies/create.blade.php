@extends('layouts.app')

@section('content')
@if(!Auth::guest())
<div class="shadow p-3 mb-5 bg-white rounded">
    <h3>Create Movies</h3>

    {!! Form::open(['action' => 'MoviesController@store' , 'method'=>'POST' , 'enctype' => 'multipart/data']) !!}
        <div class="form-group">
            {{Form::label('title' , 'Movie Title')}}
            {{Form::text('title' , '' , ['class' => 'form-control' , 'placeholder' => 'Movie Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('duration' , 'Duration (min)')}}
            {{Form::text('duration' , '' , ['class' => 'form-control' , 'placeholder' => 'Duration'])}}
        </div>
        <div class="form-group">
            {{Form::label('rating' , 'Rating')}}
            {{Form::select('rating' ,['G' => 'General Admission', 'PG' => 'Parental Guidance', 'PG-13' => 'Parents Strongly Cautioned', 'R' => 'Restricted', 'NC-17' => 'Adults Only', 'Unrated' => 'Unrated', 'Not Rated' => 'Not Rated'], null,['class' => 'form-control', 'placeholder' => 'Pick a movie rating...' ])}}
        </div>
        {{Form::submit('Submit' ,['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
  </div>
  @endif
@endsection