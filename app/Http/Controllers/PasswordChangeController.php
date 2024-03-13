<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\User;

use Hash;

class PasswordChangeController extends Controller
{
    

    
    protected $redirectTo = '/';


     public function __construct()
    {
        $this->middleware('auth');
    }
   

     public function changepassword(Request $request)
    {
       
    	$this->validator($request->all())->validate();

        $user = $this->create($request->all());

        if($user==TRUE){

        	return redirect()->to('/users/'.Auth::User()->id.'/profile')->with('message', 'Profile Edit Successfully');
        }	

		else{

			$passerror = array('oldpassword' => 'Please enter correct password');
       		return Redirect::to('/users/edit')->withInput(Input::except('oldpassword'))->withErrors($passerror);
        
		}
    }


      protected function validator(array $data)
    {


        return Validator::make($data, [
            'oldpassword' => ' required',
            'password' => [ 'required','regex:/^[a-zA-Z0-9]*([a-zA-Z][0-9]|[0-9][a-zA-Z])[a-zA-Z0-9]*$/'],
        ]);
    }




     protected function create(array $data)
    {
	
		
		 $current_password = Auth::User()->password;
		 if(Hash::check($data['oldpassword'], $current_password))
      	{           
	        $user_id = Auth::User()->id;                       
	   
			$user = User::find($user_id);

	        return([
            	$user->password =bcrypt($data['password']),
            	$user->save()
        ]);


     	 } 
    
    }

      public function log()
    {
             Auth::logout();
            Session::flush();
            return Redirect::to('login');
    }







}
