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
use App\Auditorium;
use App\Seat;






class ScreensController extends BaseController
{
 



	public function viewscreens($id){


		$screens=Auditorium::where('cinemahall_id',$id)->get();

	

		return view('admin/screens')->with('screens',$screens)->with('id',$id);
	

	}


	public function screens($id){

		return view('admin/addscreens')->with('id',$id);
	

	}

	















	public function addscreens(Request $req)
	{


	    		$data = Input::all();

	    		$rules=array(
                	'name' => 'required',
                	'seats' => 'required',
                	
                );

            $valid=Validator::make($data,$rules);
            if($valid->fails()){
                return Redirect::to('admin/addscreens/1')->withErrors($valid);
            }
            else{


					$data=new Auditorium;

					$data->tname=$req->name;
					$data->total_seat=$req->seats;
					$data->cinemahall_id=$req->id;


					$data->save();


					return Redirect::intended('admin/screens/'.$req->id.'');	   


            

            }



	}

















	public function editScreen(Request $req) {
	

			$data=Auditorium::find($req->id);

			$data->tname=$req->name;
			$data->total_seat=$req->seat;
	
			$data->save();
			return response ()->json ();



	}

		public function deleteScreen(Request $req) {
			Auditorium::find ($req->id)->delete();
			return response ()->json ();
	}












	 public function  ScreenSearch(Request $request)
    { 
        $search = $request->search;
        $id = $request->id;


       if (!empty($search)){
      
        	$result="";


            $posts = Auditorium::where([['tname','LIKE',"%{$search}%"],['cinemahall_id',$id]])->get();



            		$i = 0;
            	foreach ($posts as $key => $data) {

            					$i++;

            			$result.='<tr class="data'.$data->id. '">'.
            					'<td>'.$i.'</td>'.
            					'<td class="sname'.$data->id. '">'.$data->tname.'</td>'.
            					'<td class="sseat'.$data->id. '">'.$data->total_seat.'</td>'.
            					'<td><a href="/admin/seatdistribution/'.$data->id.'" class="view">View Distribution</a></td>'.
            					'<td><a href="/admin/show/'.$data->id.'" class="view">View Schedule</a></td>'.

            					'<td>'.

            					'<input type="hidden" class="cinema" value="'.$data->cinemahall_id. '" name=""> <a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '" data-name="'.$data->tname. '" data-seat="'.$data->total_seat. '" ><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



            					.'</td>'.
            					'<tr>';
	            	}
            
	            	return response()->json($result);
            

	            }

	            else{

	            		$result="";


            $posts = Auditorium::where('cinemahall_id',$id)->get();



            		$i = 0;
            	foreach ($posts as $key => $data) {

            					$i++;

            					
            			$result.='<tr class="data'.$data->id. '">'.
            					'<td>'.$i.'</td>'.
            					'<td class="sname'.$data->id. '">'.$data->tname.'</td>'.
            					'<td class="sseat'.$data->id. '">'.$data->total_seat.'</td>'.
            					'<td><a href="/admin/seatdistribution/'.$data->id.'" class="view">View Distribution</a></td>'.
            					'<td><a href="/admin/show/'.$data->id.'" class="view">View Schedule</a></td>'.

            					'<td>'.

            					'<input type="hidden" class="cinema" value="'.$data->cinemahall_id. '" name=""><a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '" data-name="'.$data->tname. '" data-seat="'.$data->total_seat. '" ><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



            					.'</td>'.
            					'<tr>';
	            	}
            
	            	return response()->json($result);
            



	            }
            



    }


































}
