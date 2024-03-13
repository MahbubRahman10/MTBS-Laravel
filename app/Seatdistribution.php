<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seatdistribution extends Authenticatable
{
    use Notifiable;

    
     protected $table = 'seatdistribution';

    protected $fillable = [
        'type', 'price' ,'theater_id',
    ];


       public function auditorium()
    {
        return $this->hasmany('App\Seat');
    }
  

}
