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
use App\Seatdistribution;
use App\Movie;






class SeatController extends BaseController
{
 

	public function view($name,$id){

			
		$data=Show::find($id);

		$theater_id=$data->theater_id;

        $movie=Movie::where('id',$data->movie_id)->first();



		$datas = DB::table('cinemahall')
            ->join('theater', 'cinemahall.id', '=', 'theater.cinemahall_id')
            ->where('theater.id', '=', $theater_id)
            ->get();


            $seatdistributon=Seatdistribution::where('theater_id',$theater_id)->get();
 

            $s = DB::table('book')->where('screening_id', '=', $id)->get();

            $y = DB::table('tmp')->get();



            if(count($y)>0){

            	$imditems = array();
           		 for ($i=0; $i <count($y) ; $i++) {             	
            		$imditems[$i]=$y[$i]->ticket_no;
            	}
            }


            if(count($s)>0){

            $items = array();
            for ($i=0; $i <count($s) ; $i++) {             	
            	$items[$i]=$s[$i]->ticket_no;
            }


            if(count($y)>0){

            	$finalitems=array_merge($items,$imditems);

            }
            else{

            	$finalitems=$items;
            }


           
            foreach ($finalitems as $key) {
            	
            	 $var= implode(',', $finalitems);

            }





            $myArray = explode(',', $var);

        	}
       
        	else{

        		$myArray=explode(',', "no booked");;
        	}

        	





		$result=Seat::where('theater_id',$theater_id)->get();

		$collection = collect($result);

		$type = $collection->unique('type');



		return view('/seat')->with('result',$result)->with('movie',$movie)->with('type',$type)->with('show',$data)->with('detail',$datas)->with('booked',$myArray)->with('Seatdistribution',$seatdistributon);



	}














































	public function viewseat($id){


		$seat=Seat::where('seatdistributon_id',$id)->get();

        $seatdistributon=Seatdistribution::find($id);
        $aid=$seatdistributon->theater_id;

        $data=Auditorium::where('id',$aid)->first();
        $cinemahallid=$data->cinemahall_id;


        return view('admin/Seat')->with('seat',$seat)->with('id',$id)->with('screen',$cinemahallid)->with('theater',$aid);
	

	}


	public function seat($id){

         $seatdistributon=Seatdistribution::find($id);
        $aid=$seatdistributon->theater_id;

        $data=Auditorium::where('id',$aid)->first();
        $cinemahallid=$data->cinemahall_id;



		return view('admin/addseat')->with('id',$id)->with('screen',$cinemahallid)->with('theater',$aid);
	

	}

	















	public function addseat(Request $req)
	{


	    		$data = Input::all();

	    		$rules=array(
                	'row' => 'required',
                	'column' => 'required',
                
                	
                );

            $valid=Validator::make($data,$rules);
            if($valid->fails()){
                return Redirect::to('admin/addscreens/1')->withErrors($valid);
            }
            else{


            		$query=Seatdistribution::find($req->id);

					$data=new Seat;

					$data->row=$req->row;
					$data->number=$req->column;
					$data->theater_id=$query->theater_id;
					$data->seatdistributon_id=$req->id;
					$data->type=$query->type;

	

					$data->save();


					return Redirect::intended('admin/seat/'.$req->id.'');	   


            

            }



	}





















    public function editSeat(Request $req) {
    

            $data=Seat::find($req->id);

            $data->row=$req->row;
             $data->number=$req->column;
    
            $data->save();
            return response ()->json ();



    }

        public function deleteSeat(Request $req) {
            Seat::find ($req->id)->delete();
            return response ()->json ();
    }












     public function  SeatSearch(Request $request)
    { 
        $search = $request->search;
        $id = $request->id;


       if (!empty($search)){
      
            $result="";


            $posts = Seat::where([['row','LIKE',"%{$search}%"],['type',$id]])->get();



                    $i = 0;
                foreach ($posts as $key => $data) {

                                $i++;

                        $result.='<tr class="data'.$data->id. '">'.
                                '<td>'.$i.'</td>'.
                                '<td class="sname'.$data->id. '">'.$data->type.'</td>'.
                                '<td class="srow'.$data->id. '">'.$data->row.'</td>'.
                                '<td class="scolumn'.$data->id. '">'.$data->number.'</td>'.
                                '<td>'.

                                '<input type="hidden" class="cinema" value="'.$data->type. '" name=""> <a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '" data-name="'.$data->type. '" data-row="'.$data->row. '" data-column="'.$data->number. '" ><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



                                .'</td>'.
                                '<tr>';
                    }
            
                    return response()->json($result);
            

                }

                else{

                        $result="";


            $posts = Seat::where('type',$id)->get();



                    $i = 0;
                foreach ($posts as $key => $data) {

                                $i++;

                                
                     
                        $result.='<tr class="data'.$data->id. '">'.
                                '<td>'.$i.'</td>'.
                                '<td class="sname'.$data->id. '">'.$data->type.'</td>'.
                                '<td class="srow'.$data->id. '">'.$data->row.'</td>'.
                                '<td class="scolumn'.$data->id. '">'.$data->number.'</td>'.
                                '<td>'.

                                '<input type="hidden" class="cinema" value="'.$data->type. '" name=""> <a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '" data-name="'.$data->type. '" data-row="'.$data->row. '" data-column="'.$data->number. '" ><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



                                .'</td>'.
                                '<tr>';
                    }
            
                    return response()->json($result);
            

                }
            



    }





























































}
