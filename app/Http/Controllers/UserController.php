<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Illuminate\Http\Request;
use Carbon;
use Auth;
use DB;
use Redirect;

class UserController extends BaseController
{

	public function viewuser(){

		$user=User::all();

		return view('admin/users')->with('user',$user);

	}


    public function users($id){

        $user=User::find($id);

        return view('users/users')->with('user',$user);

    }

    public function usersbook(){

       $userid = Auth::user()->id;

        $book= DB::table('book')
            ->join('screening', 'screening.id', '=', 'book.screening_id')
            ->join('cinemahall', 'cinemahall.id', '=', 'screening.cinemahall_id')
            ->join('theater', 'theater.cinemahall_id', '=', 'cinemahall.id')
            ->join('users', 'book.user_id', '=', 'users.id')
            ->where('book.user_id','=', $userid)
            ->get();

        return view('users/userbook')->with('book',$book);

    }

     public function usersedit(Request $req){

        $id= Auth::user()->id;

        $user=User::find($id);

        $user->name=$req->name;
        $user->mobile=$req->mobile;

        $user->save();

        return Redirect::intended('users/'.$id.'/profile')->with('message', 'Profile Edit Successfully');


    }






	 public function deleteUser(Request $req) {
	            User::find ($req->id)->delete();
	            return response ()->json ();
	    }













	 public function UserSearch(Request $request)
    { 
        $search = $request->search;

       if (!empty($search)){
      
            $result="";


            $posts = User::where('email','LIKE',"%{$search}%")->get();



                    $i = 0;
                foreach ($posts as $key => $data) {

                                $i++;

                        $result.='<tr class="data'.$data->id. '">'.
                                '<td>'.$i.'</td>'.
                                '<td>'.$data->name.'</td>'.
                                '<td>'.$data->email.'</td>'.
                                '<td>'.$data->mobile.'</td>'.
                                '<td>'.Carbon\Carbon::parse($data->created_at)->format('d M Y').'</td>'.
                                '<td>'.

                                '<a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



                                .'</td>'.
                                '<tr>';
                    }
            
                    return response()->json($result);
            

                }

                else{

                        $result="";


            $posts = User::all();



                    $i = 0;
                foreach ($posts as $key => $data) {

                                $i++;

                        $result.='<tr class="data'.$data->id. '">'.
                                '<td>'.$i.'</td>'.
                                '<td>'.$data->name.'</td>'.
                                '<td>'.$data->email.'</td>'.
                                '<td>'.$data->mobile.'</td>'.
                                '<td>'.Carbon\Carbon::parse($data->created_at)->format('d M Y').'</td>'.
                                '<td>'.

                                '<a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="'.$data->id. '" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>'



                                .'</td>'.
                                '<tr>';
                    }

            
                    return response()->json($result);
            




                }
            



    }





























}
