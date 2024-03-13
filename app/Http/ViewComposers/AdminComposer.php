<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use DB;
use App\Book;
use App\Theater;

class AdminComposer
{
    public function compose(view $view)
    {
		  

    	  $status = DB::table('book')->where('status','=','0')->count();
    	  $messagestatus = DB::table('message')->where('status','=','0')->count();

          $view->with('status',$status)->with('messagestatus',$messagestatus);
    }
}