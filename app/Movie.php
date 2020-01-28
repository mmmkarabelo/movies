<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //Table name
    protected $table = 'movies';

    //Primary key
    public $primaryKey = 'movie_id';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
