<?php

namespace App\Http\Controllers\Auth;


use Mail;
use App\Mail\EmailVerification;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use LaravelCaptcha\Facades\Captcha;
use Illuminate\Http\Request;
use DB;


use Auth;
use Redirect;

use Illuminate\Auth\Events\Registered;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    use RegistersUsers;

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }









    public function indexs(){


        return view('auth.register', ['captcha' => Captcha::html()]);

    }


public function register(Request $request)
{
    // Laravel validation
    $validator = $this->validator($request->all());
    if ($validator->fails()) 
    {
        $this->throwValidationException($request, $validator);
    }
    // Using database transactions is useful here because stuff happening is actually a transaction
    // I don't know what I said in the last line! Weird!
    DB::beginTransaction();
    try
    {
        $user = $this->create($request->all());
        // After creating the user send an email with the random token generated in the create method above
        $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name]));
        Mail::to($user->email)->send($email);
        DB::commit();
       return redirect()->to("/EmailConfirm");

           
            }
    catch(Exception $e)
    {
        DB::rollback(); 
        return back();
    }
}





















    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'mobile' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => [ 'required','regex:/^[a-zA-Z0-9]*([a-zA-Z][0-9]|[0-9][a-zA-Z])[a-zA-Z0-9]*$/'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => str_random(10),
        ]);
    }


    public function verify($token)
{
    // The verified method has been added to the user model and chained here
    // for better readability
    $user=User::where('email_token',$token)->firstOrFail();

     $user->verified= 1;
    $user->email_token = null;

    $user->save();

    $email=$user->email;
    $password=$user->password;

    $userdata = array(
            'email' => $email,
            'password' => $password
    );


    event(new Registered($user));
    
            $this->guard()->login($user);


            return redirect('');

}









}
