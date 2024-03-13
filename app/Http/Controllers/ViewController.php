<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Movie;
use App\Theater;
use App\Show;
use Carbon\Carbon;
use DB;


class ViewController extends BaseController
{

    	
    	public function details($name,$id,$date){

    		$movie=Movie::find($id);  

    		$dates=Carbon::parse($date)->format('Y-m-d');

		  


			$shows = DB::table('cinemahall')
            ->join('screening', 'cinemahall.id', '=', 'screening.cinemahall_id')
            ->where([['screening.date', '=', $dates], ['screening.movie_id', '=', $id],])
            ->get();



			$collection = collect($shows);

			$show = $collection->unique('hname');

			$showss = DB::table('cinemahall')
            ->join('screening', 'cinemahall.id', '=', 'screening.cinemahall_id')
            ->where([['date', '=', $dates], ['movie_id', '=', $id],])
            ->get();



			
    		return view('viewmovie')->with('movie',$movie)->with('show',$show)->with('showss',$showss)->with('name',$name)->with('id',$id)->with('date',$dates);;

    	}






         public function search(Request $request)
    { 
        $search = $request->search;


       if (!empty($search)){
      
            $result="";


            $posts = Theater::where('name','LIKE',"%{$search}%")->get();



                    $i = 0;
                foreach ($posts as $key => $data) {

                                $i++;
                    }
            
                    return response()->json($result);
            

                }

                else{

                        $result="";


            $posts = Movie::all();



                    $i = 0;
                foreach ($posts as $key => $data) {

                                $i++;
                    }
            
                    return response()->json($result);
            



                }
            



    }




























}
