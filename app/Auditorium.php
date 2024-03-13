<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auditorium extends Authenticatable
{
    use Notifiable;

    
     protected $table = 'theater';

    protected $fillable = [
        'id', 'name', 'total_seat','cinemahall_id',
    ];

  

     public function seat()
    {
        return $this->hasMany('App\Seat');
    }

     public function show()
    {
        return $this->hasMany('App\Show');
    }



        public function theater()
    {
        return $this->belongsTo('App\Theater');
    }
  



}
