@extends('layouts.master')

@section('content')




<div class="container">

		<div class="col-md-12">

		<div class="col-md-6">


			<div class="login" >

				 <form id="signup" method="post" action="/signup" >
                <h4 style="text-align: center; font-size: 175%;color: #757575;font-weight: 300;">Login</h4><hr><br>              
    <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>



				 <input name="email" type="email" placeholder="Email address"/><br>

                <input name="password" type="password" placeholder="Password" required="required" /><br>

 <label class="checkbox">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
 </label>

                
                <a href="#" class="btn btn-success" id="signin">SignUp</a>

<br><br>
                <label class="forget">

                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                	
                </label>

            </form>

				
			</div>
			
		</div>
















		<div class="col-md-6" style="border-left: 1px solid #dcdcdc;">


			<div class="register" >

				 <form id="signup" method="post" action="/register" >
				    {{ csrf_field() }}
                <h4 style="text-align: center; font-size: 175%;color: #757575;font-weight: 300;">Join today!</h4><hr><br>              
    <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>



    	<input name="name" type="text" placeholder="Name" class="name"/><br>


				 <input name="email" type="email" placeholder="Email address" class="email"/><br>
				  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif


				 <input name="mobile" type="text" placeholder="Mobile No." class="mobile"/><br>

				  @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif


                <input name="password" type="password" placeholder="Password" required="required" class="password"/><br>  <h5 class="checkpassword" style="padding: 0px 10px; margin-top: -15px;"></h5>
                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                 @endif

                 <input name="repassword" type="password" placeholder="Re-password" required="required" class="repassword"/><h5 class="checkrepassword" style="padding: 0px 10px; margin-top: 0px;"></h5>
                 <br>
                
                <button  class="btn" id="signups">SignUp</button>

<br><br>
                

            </form>

				
			</div>
			
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