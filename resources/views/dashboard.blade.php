@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card one-edge-shadow">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/movies/create" class="btn btn-primary">Create Your Movie Collection</a>
                    <hr>
                    <h3 style="color:green">You are logged in!</h3>
                    @if(count($movies) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Movie Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($movies as $movie)
                                <tr>
                                <td>{{$movie->title}}</td>
                                    <td><a href="/movies/{{$movie->movie_id}}/edit" class ="btn btn-primary">Edit</a></td>
                                    <td>

                                        {!!Form::open(['action' => ['MoviesController@destroy' , $movie->movie_id], 'method' => 'movie' , 'class' => 'float-right'])!!}
                                        {{Form::hidden('_method' , 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no movies collection</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
