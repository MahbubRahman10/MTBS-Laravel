<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Show extends Authenticatable
{
    use Notifiable;

    
     protected $table = 'screening';

    protected $fillable = [
        'id', 'movie_id', 'movie_name','theater_id','date','time',
    ];

  

}
