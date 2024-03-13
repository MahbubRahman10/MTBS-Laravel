@extends('layouts.master')

@section('content')

<br>


<div class="container" style=" ">

<!--
<div id="payment-error" class="alert alert-danger" {{ !Session::has('error') ? 'hideen' : '' }}> {{ Session::get('error') }}</div>
-->

<form action="\payment" method="post"  id="payment-form">
{{ csrf_field() }}


<div class="col-md-9" id="paymentmethod">

<br>
  <ul id="detailtab">
    <li><a>Payment Options</a></li>
  </ul>
  <ul class="nav nav-tabs" id="paytab" >
    <li class="active"><a data-toggle="tab" href="#home">CARD PAYMENT</a></li>
    <li><a data-toggle="tab" href="#menu1">MOBILE PAYMENT</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      

      <div class="" >
      
          <label>Card No: </label>
          <input type="text" id="card" name="card" class="form-control" style="width:350px">          
          <br>

          <div class="col-xs-12" style="margin-left:  -30px;">

          <div class="col-xs-6">

           <label>Expiration Month: </label>
          <input type="text"  id="month" name="month" class="form-control" style="width:150px">  
 </div>

<div class="col-xs-6" style="margin-left: -200px;">
           <label >Expiration Year: </label>
          <input type="text" id="year" name="year" class="form-control" style="width:150px">

          </div>
 </div>

<br><br><br><br>

           <label >CVV No: </label>
          <input type="text" name="cvv" id="cvv" class="form-control" style="width:350px"> 


      </div>


    </div>
    <div id="menu1" class="tab-pane fade">
       <label >Your Transaction id: </label>
          <input type="text" name="cvv" id="cvv" class="form-control" style="width:350px"> 

    </div>
    
    
  </div>

<hr>
   <ul id="detailtab">
    <li><a>Contact Details</a></li>
  </ul>

  <div class="tab-content">
    <br>
  <div id="home class="tab-pane fade in active">


          <div class="col-xs-12" style="margin-left:  -30px;">

  <input type="hidden" name="id" value="{{ Session::get('id') }}">      

<div class="col-xs-6">
           <label>Email: </label>
          <input type="text" name="email" id="email" class="form-control" @if(Auth::user()) value="{{Auth::user()->email}}" @endif style="width:250px" required>   <br>  
          @if(Auth::user())
          <input type="hidden" name="name" id="name" class="form-control" value="{{Auth::user()->name}}" style="width:250px;"  required>   <br>  

          @else

           <input type="text" name="name" id="name" class="form-control"  style="width:250px;"  required>   <br> 


           @endif 

          </div>

          <div class="col-xs-6">
           <label>Mobile: </label>
          <input type="text" name="mobile" id="mobile" class="form-control" @if(Auth::user()) value="{{Auth::user()->mobile}}" @endif style="width:250px" required>   <br>  

          </div>


 </div>
<br><br><br><br><br><br><br><br>
      
      

  </div>

  </div>




</div>



<div class="col-md-3">



<h3>{{ Session::get('moviename') }} </h3>
<p> {{ Session::get('movielanguage') }} | {{ Session::get('moviegenres') }} </p>
<hr>


<p>Theater</p>
<h4>{{ Session::get('hallname') }}</h4>
<p>{{ Session::get('location') }}</p>

<br><br>


<p>Showtime</p>



<h4>{{ Session::get('date') }} {{ Session::get('time') }}</h4>

<hr>


<section class="cost">

<h4><strong>Total Ticket  </strong><span style="float: right;">{{ Session::get('totalticket') }}</span></h4>

<h4><strong>Seat No.  </strong><span style="float: right;">{{ Session::get('ticket') }}</span></h4>

<h4><strong>Price  </strong><span style="float: right;">Tk. {{ Session::get('price') }}</span></h4>


<hr>

<h4><strong>Amount Payable  </strong><span style="float: right;">Tk. {{ Session::get('price') }}</span></h4>
</section>

<br>

<button type="submit" class="btn btn-primary" id="countdown" style="font-size: 25px; padding: 10px 120px; border-radius: 0; margin-bottom: 20px;" >10:00</button>



<a href="" class="btn btn-danger" style="padding: 10px 128px; border-radius: 0">Cancel</a>


 <a style="display:none;" id="modals" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"  data-backdrop="static" data-keyboard="false"></a>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  <h4 class="modal-title">Alert!</h4>
	</div>
	<div class="modal-body">
	  <p>Timeout.</p>
	</div>
	<div class="modal-footer">
	  <a href="/" class="btn btn-primary" >Try again</a>
	</div>
  </div>
</div>
</div>




</div>
</form>




</div>






<script type="text/javascript" src="/js/jquery-2.0.3.js"></script>
 <script type="text/javascript" src="/js/jquery.countdownTimer.js"></script>


   <script>
                                $(function(){
                                    $('#countdown').countdowntimer({
                                        minutes :10,
                                        size : "lg"
                                    });
                                });
                            </script>
 


<script type="text/javascript">
	
$("body").on('DOMSubtreeModified', "#countdown", function() {
   
	var time=$('#countdown').html();


	if(time=="00:00"){
			$("#modals")[0].click()
	}


});

</script>



<script type="text/javascript">
	$(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });

</script>













<script src="https://js.stripe.com/v2/"></script>
<script>
  Stripe.setPublishableKey('pk_test_9EMqxlMcFqfgMSIfr5YmZ0mD')


  var $form=$('#payment-form');

  $form.submit(function(event){


    $('#payment-error').addClass('hidden');
    $form.find('button').prop('disabled',true);



  Stripe.card.createToken({
    number: $('#card').val(),
    cvc: $('#cvv').val(),
    exp_month: $('#month').val(),
    exp_year: $('#year').val(),
    name: $('#name').val()
  }, stripeResponseHandler);

  return false;

  });


  function stripeResponseHandler(status, response){
  

  if(response.error){


  
    $('#payemt.error').removeClass('hidden');
    $('#payemt.error').text(response.error.message);
    $form.find('button').prop('disabled',false);    

  }

  else{
  
    var token = response.id;
    $form.append($('<input type="hidden" name="stripeToken" />').val(token));

     $form.get(0).submit();

  }


}


</script>
















@endsection





