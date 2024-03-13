<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



use App\Movie;
use DB;
use Carbon\Carbon;
use App\UpcomingMovie;

class IndexController extends BaseController
{
    	
    	public function index(){

    		$movie=Movie::orderBy('created_at', 'desc')->get();
            $upcomingmovie=UpcomingMovie::all();
            $datas=DB::table('slide')->get();



    		$data=DB::table('tmp')->get();
    		foreach ($data as $value) {
    			$s=Carbon::parse($value->created_at)->diffForHumans();
    			if($s >="2 minutes ago"){
    				DB::table('tmp')->delete();
    			}}
		



    		return view('index')->with('movie',$movie)->with('slide',$datas)->with('upcomingmovie',$upcomingmovie);





    	}

}

    		