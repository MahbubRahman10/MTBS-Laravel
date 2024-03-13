<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Book extends Authenticatable
{
    use Notifiable;

    
     protected $table = 'book';

   

       public function auditorium()
    {
        return $this->belongsTo('App\Auditorium');
    }
  

}
