<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;
use App\User;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


     /**
     * Redirect the user to the facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($servicve)
    {
        return Socialite::driver($servicve)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($servicve)
    {
        $user = Socialite::driver($servicve)->user();

       
        $findUser=User::where('email',$user->email)->first();

        if($findUser){
            Auth::login($findUser);

           return redirect('');
        }

        else{

            $users=new User;

            $users->name=$user->name;
            $users->email=$user->email;
             $users->password=bcrypt(123456);
            $users->verified='1';
            $users->method="Socialmedia";

            $users->save();

            Auth::login($users);

            return redirect('');

        }




    }



























}
