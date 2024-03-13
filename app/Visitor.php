<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitlogs';
		
	protected $fillable = [
			'id','ip','browser','os','user_id','user_name',	'country_code','country_name','region_name','city','zip_code','time_zone','latitude','longitude'];
	
	



}
