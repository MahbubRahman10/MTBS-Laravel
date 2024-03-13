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




class SeatdistributionController extends BaseController
{
 

	public function viewseat($id){


        $show=Seatdistribution::where('theater_id',$id)->get();
        $data=Auditorium::where('id',$id)->first();
        $cinemahallid=$data->cinemahall_id;


        return view('admin/seatdistribution')->with('seatdistribution',$show)->with('id',$id)->with('screen',$cinemahallid);
    

    }



        public function seatdistribution($id){


        $data=Auditorium::where('id',$id)->first();
        $cinemahallid=$data->cinemahall_id;
        
        
        return view('admin/addseatcategory')->with('id',$id)->with('screen',$cinemahallid);
    
    }







    public function addseatcategory(Request $req)
    {


                $data = Input::all();

                $rules=array(
                    'name' => 'required',
                    'price' => 'required',
                    
                );

            $valid=Validator::make($data,$rules);
            if($valid->fails()){
                return Redirect::to('admin/addscreens/1')->withErrors($valid);
            }
            else{


                    $data=new Seatdistribution;

                    $data->type=$req->name;
                    $data->price=$req->price;
                    $data->theater_id=$req->id;


                    $data->save();


                   return Redirect::intended('admin/seatdistribution/'.$req->id.'');     


            

            }



    }


















    public function editSeatdistribution(Request $req) {
    

            $data=Seatdistribution::find($req->id);

            $data->type=$req->name;
            $data->price=$req->price;
    
            $data->save();
            return response ()->json ();



    }

        public function deleteSeatdistribution(Request $req) {
            Seatdistribution::find ($req->id)->delete();
            return response ()->json ();
    }












     public function  SeatdistributionSearch(Request $request)
    { 
        $search = $request->search;
        $id = $request->id;


       if (!empty($search)){
      
            $result="";


            $posts = Seatdistribution::where([['type','LIKE',"%{$search}%"],['theater_id',$id]])->get();



                    $i = 0;
                foreach ($posts as $key => $data) {

                                $i++;

                        $result.='<tr class="data'.$data->id. '">'.
                                '<td>'.$i.'</td>'.
                                '<td class="sname'.$data->id. '">'.$data->type.'</td>'.
                                '<td class="sprice'.$data->id. '">'.$data->price.'</td>'.
                                '<td><a href="/admin/seat/'.$data->id.'" class="view">View Distribution</a></td>'.
                                '<td>'.

                                '<input type="hidden" class="cinema" value="'.$data->theater_id. '" name=""> <a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '" data-name="'.$data->type. '" data-price="'.$data->price. '" ><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



                                .'</td>'.
                                '<tr>';
                    }
            
                    return response()->json($result);
            

                }

                else{

                        $result="";


            $posts = Seatdistribution::where('Theater_id',$id)->get();



                    $i = 0;
                foreach ($posts as $key => $data) {

                                $i++;

                              
                        $result.='<tr class="data'.$data->id. '">'.
                                '<td>'.$i.'</td>'.
                                '<td class="sname'.$data->id. '">'.$data->type.'</td>'.
                                '<td class="sprice'.$data->id. '">'.$data->price.'</td>'.
                                '<td><a href="/admin/seat/'.$data->id.'" class="view">View Distribution</a></td>'.
                                '<td>'.

                                '<input type="hidden" class="cinema" value="'.$data->theater_id. '" name=""> <a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->id. '" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="'.$data->id. '" data-name="'.$data->type. '" data-price="'.$data->price. '" ><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



                                .'</td>'.
                                '<tr>';
                    }
            
                    return response()->json($result);
            




                }
            



    }
































































}
