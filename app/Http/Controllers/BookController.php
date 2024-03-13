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
use Session;
use App\tmp;
use App\Book;

class BookController extends BaseController
{

    	
    	public function book($name,$id,Request $req){


            $t=$req->seat;
             $price=$req->ticket;


            $ticket=substr($t, 0, -1);
            
            $array = explode(",", $ticket);
            $totalticket = count($array);



            $data=Show::find($id);
            $theater=Theater::where('id',$data->cinemahall_id)->first();


            $movie=Movie::where('id',$data->movie_id)->first();


            $datetime=Carbon::parse($data->date)->format('D, d-m-Y');

            Session::set('moviename', $data->movie_name);
            Session::set('movielanguage', $movie->language);
            Session::set('moviegenres', $movie->genres);
            Session::set('hallname', $theater->hname);
            Session::set('location', $theater->location);
            Session::set('date', $datetime);
             Session::set('time', $data->time);
              Session::set('totalticket', $totalticket);
            Session::set('ticket', $ticket);
             Session::set('price', $price);



             $tmp=new tmp;

             $tmp->movie_id=$data->movie_id;
             $tmp->theater_id=$data->theater_id;
             $tmp->screening_id=$data->id;
             $tmp->ticket=$totalticket;
             $tmp->ticket_no=$ticket;
             $tmp->price=$price;

             $tmp->save();


              $insertedId = $tmp->id;

              Session::set('id', $insertedId);

            
            return redirect()->to('book/confirm');


    	}













        public function showbook(){

            $book= DB::table('book')
            ->join('screening', 'screening.id', '=', 'book.screening_id')
            ->join('cinemahall', 'cinemahall.id', '=', 'screening.cinemahall_id')
            ->join('theater', 'theater.cinemahall_id', '=', 'cinemahall.id')
            ->orderby('bookID','desc')
            ->get();

   

            return view('admin/book')->with('book',$book);


        }



        public function StatusBook(Request $req) {
            
           

             DB::table('book')
            ->where('bookId', $req->id)
            ->update(['status' => "1"]);
            return response ()->json ();


        }



           public function deleteBook(Request $req) {
            Book::where('bookId',$req->id)->delete();
            return response ()->json ();
        }





     public function BookSearch(Request $request)
    { 
			$search = $request->search;
			if (!empty($search)){
		  
			$result="";

            $posts= DB::table('book')
            ->join('screening', 'screening.id', '=', 'book.screening_id')
            ->join('cinemahall', 'cinemahall.id', '=', 'screening.cinemahall_id')
            ->join('theater', 'theater.cinemahall_id', '=', 'cinemahall.id')
            ->join('users', 'book.user_id', '=', 'users.id')
            ->where('token','LIKE',"%{$search}%")
            ->get();


            $i = 0;
            foreach ($posts as $key => $data) {

                                $i++;

                        $result.= '<tr class="data{{$data->bookId}}">'.
                 
                  '<td>'.$i.'</td>'.

                  '<td class="btoken'.$data->bookId. '">'.$data->token.'</td>'.
                  '<td class="bmname'.$data->bookId.'">'.$data->movie_name .'</td>'.
                  '<td class="btheater'.$data->bookId.'">'.$data->name .'</td>'.
                  '<td class="bemail'.$data->bookId.'">'.$data->email .'</td>'.
                   '<td class="bpayment'.$data->bookId.'">'.$data->payment_type .'</td>'.
                  '<td class="btid '.$data->bookId.'">'.$data->transaction_id .'</td>'.
                  '<td class="bticket '.$data->bookId.'">'.$data->ticket .'</td>'.
                  '<td class="bprice '.$data->bookId.'">'.$data->price .'</td>'.
                   
                 
                  
                  
                                  
                  '<td>'.
                  '<span class="details'.$data->bookId.'" style="display: none;"  data-date="'.$data->date.'" data-time="'.$data->time.'" data-phone="'.$data->mobile.'" data-seat="'.$data->ticket_no.'" data-price="'.$data->price.'"></span>

                  
                    <a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->bookId.'" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->bookId.'" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'
                  


                 .'</td>'.
                '<tr>';
					
					
					
					
					  }
            
                    return response()->json($result);
            

                }
					
                else{

                        $result="";


             $posts= DB::table('book')
            ->join('screening', 'screening.id', '=', 'book.screening_id')
            ->join('cinemahall', 'cinemahall.id', '=', 'screening.cinemahall_id')
            ->join('theater', 'theater.cinemahall_id', '=', 'cinemahall.id')
            ->join('users', 'book.user_id', '=', 'users.id')
            ->get();



                    $i = 0;
                foreach ($posts as $key => $data) {

                                $i++;

						
						  $result.= '<tr class="data{{$data->bookId}}">'.
                 
                  '<td>'.$i.'</td>'.

                    '<td class="btoken'.$data->bookId.'">'.$data->token.'</td>'.
                  '<td class="bmname'.$data->bookId.'">'.$data->movie_name .'</td>'.
                  '<td class="btheater'.$data->bookId.'">'.$data->name .'</td>'.
                  '<td class="bemail'.$data->bookId.'">'.$data->email .'</td>'.
                   '<td class="bpayment'.$data->bookId.'">'.$data->payment_type .'</td>'.
                  '<td class="btid '.$data->bookId.'">'.$data->transaction_id .'</td>'.
                  '<td class="bticket '.$data->bookId.'">'.$data->ticket .'</td>'.
                  '<td class="bprice '.$data->bookId.'">'.$data->price .'</td>'.
                   
                 
                  
                  
                                  
                  '<td>'.
                  '<span class="details'.$data->bookId.'" style="display: none;"  data-date="'.$data->date.'" data-time="'.$data->time.'" data-phone="'.$data->mobile.'" data-seat="'.$data->ticket_no.'" data-price="'.$data->price.'"></span>

                  
                    <a href="" class="btn btn-success" id="viewdata"  data-id="'.$data->bookId.'" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->bookId.'" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'
                  


                 .'</td>'.
                '<tr>';
						
					  
					  
                    }
            
                    return response()->json($result);
            



                }
            



    }












}
