<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seat extends Authenticatable
{
    use Notifiable;

    
     protected $table = 'seat';

    protected $fillable = [
        'row', 'number' ,'type', 'status','	theater_id','seatdistributon_id',
    ];


        public function seatdistribution()
    {
        return $this->belongsTo('App\Seatdistribution');
    }
  

       public function auditorium()
    {
        return $this->belongsTo('App\Auditorium');
    }
  

}
