<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Illuminate\Http\Request;
use Carbon;
use DB;
use Redirect;
use Validator;
use Illuminate\Support\Facades\Input;
use Charts;
use Calendar;
use App\Visitor;


class AdminController extends BaseController
{



        public function index(){

        $user=DB::table('users')->count();
        /* $user=DB::table('visitor')->count(); */
        $movie=DB::table('movies')->count();
        $theater=DB::table('cinemahall')->count();
        $book=DB::table('book')->count();



        $calendar = \Calendar::setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
                'viewRender' => 'function() {;}'
            ]); 


        $pie=Charts::create('pie', 'highcharts')
        ->title('Overview')
        ->labels(['User', 'Movie','Theater','Booking'])
        ->values([$user,$movie,$theater,$book])
        ->dimensions(500,300)
        ->responsive(false);




        $database= DB::table('movies')
            ->join('screening', 'screening.movie_id', '=', 'movies.id')
            ->get();



        $u = Charts::database($database, 'bar', 'highcharts')
        ->title('Feature Screen')
        ->elementLabel("Language")
        ->dimensions(500, 300)
        ->responsive(false)
        ->groupBy('country');




            $items = array();
            $totals = array();

            $j=DB::table('visitlogs')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
            ->groupBy('date')
            ->get();



            for ($i=0; $i <count($j); $i++) { 

            $items[$i]=$j[$i]->date;
            $totals[$i]=$j[$i]->views;

            }

            $chart =Charts::database(Visitor::all(), 'line', 'highcharts')
            ->title('VISITOR STATISTICS')
            ->elementLabel('visitors')
            ->labels($items)
            ->values($totals)
            ->dimensions(500,300)
            ->responsive(false);

       


        return view('admin/index', compact('user','movie', 'book','calendar','pie','u','chart'));

    }
























	public function view(){

		$user=User::where('isAdmin',1)->get();

		return view('admin/viewadmin')->with('admin',$user);

	}





    public function message(Request $req)
    {


                $data = Input::all();


                $rules=array(
                    'name' => 'required',
                    'email' => 'required',
                    'description' => 'required',
                    
                );

            $valid=Validator::make($data,$rules);
            if($valid->fails()){
                 return back()->withInput()->withErrors($valid);
            }
            else{


                   	
					$userdata = array(
					'name' => $req->name,
					'email' => $req->email,
					'message' => $req->description
										);

					$data=DB::table('message')->insert($userdata);
   

                    return Redirect::intended('success');                 

            

            }




        }














	  public function showmessage(){

            $message= DB::table('message')->orderby('id','desc')->get();

            return view('admin/message')->with('message',$message);


        }



        public function StatusMessage(Request $req) {
            
           

             DB::table('message')
            ->where('id', $req->id)
            ->update(['status' => "1"]);
            return response ()->json ();


        }



           public function deleteMessage(Request $req) {
              DB::table('message')->where('id', $req->id)->delete();
            return response ()->json ();
        }




	
}
