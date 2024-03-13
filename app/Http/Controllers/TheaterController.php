<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use Validator;
use Response;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use App\Theater;
use App\Movie;
use Carbon\carbon;
use Mapper;


class TheaterController extends BaseController
{
 




	public function details($name,$date){


		$theater=Theater::where('hname',$name)->get();


		foreach ($theater as $key => $value) {
			$cid=$value->id;
             $Latitude=$value->latitude;
            $Longitude=$value->longitude;

		}
 


			$dates=Carbon::parse($date)->format('Y-m-d');

			$shows = DB::table('cinemahall')
            ->join('screening', 'cinemahall.id', '=', 'screening.cinemahall_id')
            ->where([['screening.cinemahall_id', '=', $cid], ['screening.date', '=', $dates]])
            ->get();

            if($shows->isEmpty()){

            	$show=[];
				$showss=[];



                 

  Mapper::map($Latitude, $Longitude,['zoom' => 19, 'marker' => true]);



           return view('theater')->with('theater',$theater)->with('show',$show)->with('showss',$showss)->with('name',$name);

             }

            else{

			$collection = collect($shows);
			$show = $collection->unique('movie_name');
			
			foreach ($show as $key => $values) {
				$mid=$values->movie_id;
			}
 



			$showss = DB::table('cinemahall')
            ->join('screening', 'cinemahall.id', '=', 'screening.cinemahall_id')
            ->where([['date', '=', $dates], ['movie_id', '=', $mid],])
            ->get();






        


            Mapper::map($Latitude, $Longitude,['zoom' => 19, 'marker' => true]);












    		return view('theater')->with('theater',$theater)->with('show',$show)->with('showss',$showss)->with('name',$name);

            }




			



	

	}























































	public function viewtheater(){


		$theater=Theater::all();

		return view('admin/theater')->with('theater',$theater);
	

	}















	public function addtheater(Request $req)
	{


	    		$data = Input::all();

	    		$rules=array(
                	'name' => 'required',
                	'address' => 'required',
                	'city' => 'required',
                	'phone' => 'required',
                	'about' => 'required',
                    'latitude' => 'required',
                    'longitude' => 'required',
                	
                );

            $valid=Validator::make($data,$rules);
            if($valid->fails()){
                return Redirect::to('admin/addtheat')->withErrors($valid);
            }
            else{


	    		


					$theater=new Theater;

					$theater->hname=$req->name;
					$theater->location=$req->address;
					$theater->city=$req->city;
					$theater->phone=$req->phone;
					$theater->about=$req->about;
                    $theater->latitude=$req->latitude;
                    $theater->longitude=$req->longitude;
	

					$theater->save();






					return Redirect::intended('admin/theater');	    			
            

            }



	}



	public function editTheater(Request $req) {
	

			$data=Theater::find($req->id);

			$data->hname=$req->name;
			$data->location=$req->location;
			$data->city=$req->city;
			$data->phone=$req->phone;
		
			$data->save();

			return response ()->json ();



	}

		public function deleteTheater(Request $req) {
			Theater::find ($req->id)->delete();
			return response ()->json ();
	}












	 public function TheaterSearch(Request $request)
    { 
        $search = $request->search;


       if (!empty($search)){
      
        	$result="";


            $posts = Theater::where('hname','LIKE',"%{$search}%")->get();



            		$i = 0;
            	foreach ($posts as $key => $data) {

            					$i++;

            			$result.='<tr class="data'.$data->id. '">'.
            					'<td>'.$i.'</td>'.
            					'<td class="tname'.$data->id. '">'.$data->hname.'</td>'.
            					'<td class="tlocation'.$data->id. '">'.$data->location.'</td>'.
            					'<td class="tcity'.$data->id. '">'.$data->city.'</td>'.
            					'<td class="tphone'.$data->id. '">'.$data->phone.'</td>'.
            					'<td><a href="/admin/screens/'.$data->id.'" class="view">View Screens</a></td>'.
            					'<td>'.

            					'<a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '" data-name="'.$data->hname. '" data-location="'.$data->location. '" data-city="'.$data->city. '" data-phone="'.$data->phone. '"><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



            					.'</td>'.
            					'<tr>';
	            	}
            
	            	return response()->json($result);
            

	            }

	            else{

	            		$result="";


            $posts = Theater::all();



            		$i = 0;
            	foreach ($posts as $key => $data) {

            					$i++;

            						$result.='<tr class="data'.$data->id. '">'.
            					'<td>'.$i.'</td>'.
            					'<td class="tname'.$data->id. '">'.$data->hname.'</td>'.
            					'<td class="tlocation'.$data->id. '">'.$data->location.'</td>'.
            					'<td class="tcity'.$data->id. '">'.$data->city.'</td>'.
            					'<td class="tphone'.$data->id. '">'.$data->phone.'</td>'.
            					'<td><a href="/admin/screens/'.$data->id.'" class="view">View Screens</a></td>'.
            					'<td>'.

            					'<a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '" data-name="'.$data->hname. '" data-location="'.$data->location. '" data-city="'.$data->city. '" data-phone="'.$data->phone. '"><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



            					.'</td>'.
            					'<tr>';
            			
	            	}
            
	            	return response()->json($result);
            



	            }
            



    }














































}
