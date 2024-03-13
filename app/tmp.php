<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tmp extends Authenticatable
{
    use Notifiable;

    
     protected $table = 'tmp';

   

       public function auditorium()
    {
        return $this->belongsTo('App\Auditorium');
    }
  

}
