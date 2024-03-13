<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use DB;
use App\Movie;
use App\Theater;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;

class NavComposer
{
    public function compose(view $view)
    {
		  
		  $movies=Movie::all();
		  $theaters=Theater::all();
		  
		  VisitLog::save();
          
          $view->with('movies',$movies)->with('theaters',$theaters);
    }
}