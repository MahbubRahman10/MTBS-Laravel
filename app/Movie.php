<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Movie extends Authenticatable
{
    use Notifiable;

    
     protected $table = 'movies';

    protected $fillable = [
        'id', 'name', 'genres','relaseDate','imdbRating','poster','cast','director','musicDirector','aboutMovie',
    ];

  

}
