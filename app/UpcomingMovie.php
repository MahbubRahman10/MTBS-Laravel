<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UpcomingMovie extends Authenticatable
{
    use Notifiable;

    
     protected $table = 'upcomingmovies';

    protected $fillable = [
        'id', 'movie_name', 'genres','relaseDate','imdbRating','poster','cast','director','musicDirector','aboutMovie',
    ];

  

}
