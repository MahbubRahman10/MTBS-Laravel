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
use Session;
use App\Book;
use App\Seatdistribution;
use PDF;







class TicketController extends BaseController
{
 

	public function ticket(){


			
			$data= DB::table('book')
            ->join('screening', 'screening.id', '=', 'book.screening_id')
            ->join('cinemahall', 'cinemahall.id', '=', 'screening.cinemahall_id')
            ->join('theater', 'theater.cinemahall_id', '=', 'cinemahall.id')
            ->where('transaction_id', '=', Session::get('incidentData.tid'))
            ->first();
        


			$pdf=PDF::loadView('ticket',['data' => $data]);
				
    		return $pdf->download('tickets.pdf');

            

        }
}