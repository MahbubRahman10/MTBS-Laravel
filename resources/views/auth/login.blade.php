@extends('layouts.master')

@section('content')




<div class="container">

    <div class="col-md-12">
        <div class="login" >
            <form id="signup" method="post" action="{{ url('/login') }}" >
                {{ csrf_field() }}
                <h4 style="text-align: center; font-size: 175%;color: #757575;font-weight: 300;">Login</h4><hr><br> 
                <div class="social">
                    <span>
                        <a href="/login/facebook"> <div class="fb-icon-bg"><i class="fa fa-facebook" style="background: #354f88; font-size: 27px; padding: 3px 12px; margin-top: 2px;" ></i></div>
                        <div class="fb-bg"></div></a>
                    </span>
                    <span>
                        <a href="/login/twitter"><div class="twi-icon-bg"> <i class="fa fa-twitter" style="background: #40a2d1; font-size: 27px; padding: 3px 8px; margin-top: 2px;" > </i></div>
                        <div class="twi-bg"></div> </a>
                    </span>
                </div>        
                <h4 class="soc">OR</h4>
                <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false">
                </div>

                <input name="email" type="email" placeholder="Email address" required="required"/>

                @if ($errors->has('email'))
                <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('email') }}</strong>
                </span>
                @endif <br>

                <input name="password" type="password" placeholder="Password" required="required" /><br>

                @if ($errors->has('password'))
                <span class="help-block">
                    <strong style="color: red;">{{ $errors->first('password') }}</strong>
                </span>
                @endif



                <label class="checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                </label>


                <button  type="submit" class="btn btn-primary" id="signin">SignIN</button><br><br>


                <label class="ma" style="padding: 0px 40px;">
                    <span >Need an account?<span>
                    <a href="{{ url('/register') }}"> Register Here</a>
                </label>                         
                <label class="forget">
                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                    Forgot Your Password?
                    </a>
                </label>        
            </form>
        </div>





















</div>


</div>


































































<script type="text/javascript">
    


    $(document).ready(function(){

$(".password").on("input",function (e)  {
    e.preventDefault();
var password = $(".password").val();

    $('.checkpassword').html('<img src="/img/Loading.gif" width="60" />');
       
            console.log(password)
 var regex = new RegExp("^(?=.*[A-Za-z])(?=.*[0-9])[A-Za-z0-9]{6,}$");
     

if (password.length<=5) {

    $(".checkpassword").html("password must be at least 6 characters");
    $(".password").css("border-color", "#a94442");
    $(".checkpassword").css("color", "#a94442");

}


else if(regex.test(password))
{

        $(".checkpassword").html("Password is correct");
        $(".password").css("border-color", "#3c763d");
        $(".checkpassword").css("color", "#3c763d");
             
}

else{

    $(".checkpassword").html("password must contain at least one letter and one number");
    $(".password").css("border-color", "#a94442");
    $(".checkpassword").css("color", "#a94442");


}



});

});

</script>








<script type="text/javascript">
    


    $(document).ready(function(){

$(".repassword").on("input",function (e)  {
    e.preventDefault();
var repassword = $(".repassword").val();

var password = $(".password").val();

       
if (repassword.length>=6) {


if(repassword==password)
{

        $(".checkrepassword").html("password is matched");
        $(".repassword").css("border-color", "#3c763d");
        $(".checkrepassword").css("color", "#3c763d");
             
}

else{

    $(".checkrepassword").html("password is not matched");
    $(".repassword").css("border-color", "#a94442");
    $(".checkrepassword").css("color", "#a94442");


}



}
else{


}



});

});

</script>







































@endsection