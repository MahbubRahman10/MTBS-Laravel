<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Theater extends Authenticatable
{
    use Notifiable;

    
     protected $table = 'cinemahall';

    protected $fillable = [
        'id', 'name', 'location','city','phone','about',
    ];

  	
      public function auditorium()
    {
        return $this->hasMany('App\Auditorium');
    }


    public function show()
    {
        return $this->hasMany('App\Show');
    }



}
