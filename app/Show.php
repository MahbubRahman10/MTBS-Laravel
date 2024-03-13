<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Show extends Authenticatable
{
    use Notifiable;

    
     protected $table = 'screening';

    protected $fillable = [
        'id', 'movie_id', 'movie_name','cinemahall_id','theater_id','date','time',
    ];



        public function auditorium()
    {
        return $this->belongsTo('App\Auditorium');
    }

        public function theater()
    {
        return $this->belongsTo('App\Theater','id');
    }
  
  

}
