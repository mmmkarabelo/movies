<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use DB;

class MoviesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::orderBy('created_at','asc')->paginate(10);
        return view('movies.index')->with('movies', $movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'duration' => 'required',
            'rating' => 'required'
        ]);
        
        $movie = new Movie;
        $movie->title = $request->input('title');
        $movie->duration = $request->input('duration');
        $movie->rating = $request->input('rating');
        $movie->user_id = auth()->user()->id;
        $movie->save();

        return redirect('/movies')->with('success', 'Movie Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $movie =  Movie::find($id);
        return view('movies.show')->with('movie', $movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //
        $movie =  Movie::find($id);

        //check for correct user
        if(auth()-> user()->id !== $movie->user_id)
        {
            return redirect('/movies')->with('error', 'Unauthorized Page');
        }
        return view('movies.edit')->with('movie', $movie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //
         $this->validate($request, [
            'title' => 'required',
            'duration' => 'required',
            'rating' => 'required'
        ]);
        
        $movie = Movie::find($id);
        $movie->title = $request->input('title');
        $movie->duration = $request->input('duration');
        $movie->rating = $request->input('rating');
        $movie->user_id = auth()->user()->id;
        $movie->save();

        return redirect('/movies')->with('success', 'Movie Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $movie = Movie::find($id);

        if(auth()-> user()->id !== $movie ->user_id)
        {
            return redirect('/movies')->with('error', 'Unauthorized Page');
        }
        
        $movie->delete();
        return redirect('/movies')->with('success', 'Movie Removed');
    }
}
