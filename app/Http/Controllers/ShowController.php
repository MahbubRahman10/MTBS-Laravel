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
use App\Show;
use App\Seat;
use App\Movie;





class ShowController extends BaseController
{
 



	public function viewshow($id){


		
		$show=Show::where('theater_id',$id)->get();
		$movie= Movie::all();

        $data=Auditorium::where('id',$id)->first();
        $cinemahallid=$data->cinemahall_id;


		return view('admin/show')->with('show',$show)->with('id',$id)->with('movie',$movie)->with('screen',$cinemahallid);;
	

	}


	public function show($id){


		$movie= Movie::pluck('name', 'id')->toArray(); 

        $data=Auditorium::where('id',$id)->first();
        $cinemahallid=$data->cinemahall_id; 

		return view('admin/addshow')->with('id',$id)->with('movie',$movie)->with('screen',$cinemahallid);
	

	}

	















	public function addshow(Request $req)
	{

				$id=$req->id;

	    		$data = Input::all();

	    		$rules=array(
	    			'movie' => 'required',
                	'date' => 'required',
                	'time' => 'required',
                	
                );



            $valid=Validator::make($data,$rules);
            if($valid->fails()){
                return Redirect::to('admin/addscreens/'.$id.'')->withErrors($valid);
            }
            else{


					$data=new Show;

					$id=$req->id;

					$auditorium=Auditorium::find($id);

					$cinema_id=$auditorium->cinemahall_id;

					$query=Movie::find($req->movie);

					$data->movie_id=$req->movie;
					$data->movie_name=$query->name;
					$data->date=$req->date;
					$data->time=$req->time;

					$data->theater_id=$id;
					$data->cinemahall_id=$cinema_id;

					$data->save();







					return Redirect::intended('admin/show/'.$req->id.'');	   


            

            }



	}






    public function editShow(Request $req) {
    

            $data=Show::find($req->id);

            $data->movie_name=$req->name;
            $data->date=$req->date;
             $data->time=$req->time;
    
            $data->save();
            return response ()->json ();



    }

        public function deleteShow(Request $req) {
            Show::find ($req->id)->delete();
            return response ()->json ();
    }




      public function ShowSearch(Request $request)
    { 
        $search = $request->search;
        $id = $request->id;


       if (!empty($search)){
      
            $result="";


            $posts = Show::where('movie_name','LIKE',"%{$search}%")->get();



                    $i = 0;
                foreach ($posts as $key => $data) {

                                $i++;

                        $result.='<tr class="data'.$data->id. '">'.
                                '<td>'.$i.'</td>'.
                                '<td class="sname'.$data->id. '">'.$data->movie_name.'</td>'.
                                '<td class="sdate'.$data->id. '">'.$data->date.'</td>'.
                                '<td class="stime'.$data->id. '">'.$data->time.'</td>'.
                                '<td>'.

                                '<a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '"  data-name="'.$data->movie_name.'" data-date="'.$data->date.'" data-time="'.$data->time.'" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '"><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



                                .'</td>'.
                                '<tr>';
                    }
            
                    return response()->json($result);
            

                }

                else{

                        $result="";


            $posts = Show::all();



                    $i = 0;
                 foreach ($posts as $key => $data) {

                                $i++;

                        $result.='<tr class="data'.$data->id. '">'.
                                '<td>'.$i.'</td>'.
                                '<td class="sname'.$data->id. '">'.$data->movie_name.'</td>'.
                                '<td class="sdate'.$data->id. '">'.$data->date.'</td>'.
                                '<td class="stime'.$data->id. '">'.$data->time.'</td>'.
                                '<td>'.

                                '<a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '"  data-name="'.$data->movie_name.'" data-date="'.$data->date.'" data-time="'.$data->time.'" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '"><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



                                .'</td>'.
                                '<tr>';
                    }

            
                    return response()->json($result);
            




                }
            



    }




















}
