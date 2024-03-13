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
use Session;
use App\Book;
use App\tmp;
use App\Movie;
use Stripe\Stripe;





class PaymentController extends BaseController
{
 



	public function payment(Request $req){


			$data=tmp::find(Session::get('id'));



			Stripe::setApiKey('sk_test_bfOsAOet9HHgFW6qmtgFxU2R');

			try{

					$charge = \Stripe\Charge::create(array(
					"amount"=>$data->price * 100, 
					"currency"=>"usd",
					"source"=>$req->stripeToken,
					"description" => "Test Charge"
					));


					$book=new Book;

					if(Auth::user()){

						$book->user_type="Register";
					}


					$book->token=$this->Token(5);
					$book->transaction_id=$charge->id;
					$book->movie_id=$data->movie_id;
					$book->theater_id=$data->theater_id;
					$book->screening_id=$data->screening_id;
					$book->ticket=$data->ticket;
					$book->ticket_no=$data->ticket_no;
					$book->price=$data->price;
					$book->payment_type="credit/Debit card";
					$book->email=$req->email;
					$book->mobile=$req->mobile;

					$book->save();



				tmp::find (Session::get('id'))->delete();


			}

			catch(\Exception $e){

				 dd($e);
			}





			$incidentData = ['tid' => $charge->id,'name' => Session::get('moviename'), 'cinemallname' => Session::get('hallname') , 'date' => Session::get('date'), 'time' => Session::get('time') ];
    	
    		Session::set('incidentData', $incidentData);


			return redirect()->to('booked');
	

	}

	function Token($length){
     $token = "";
     $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
     $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
     $codeAlphabet.= "0123456789";
     $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
        $token .= $codeAlphabet[random_int(0, $max-1)];
    }

    	return $token;	
	}	



}
