@extends('layouts.master')

@section('content')

<br>


<div class="container" style=" ">


<div id="payment-error" class="alert alert-danger" {{ !Session::has('error') ? 'hideen' : '' }}> {{ Session::get('error') }}</div>


<form method="post" action="\payment" id="payment-form">
{{ csrf_field() }}
<div class="col-md-9" id="paymentmethod">

<br><br>

  <ul id="detailtab">
    <li><a>Payment Options</a></li>
  </ul>
  <ul class="nav nav-tabs" id="paytab" >
    <li class="active"><a data-toggle="tab" href="#home">CARD PAYMENT</a></li>
    <li><a data-toggle="tab" href="#menu1">MOBILE PAYMENT</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      
      <br>

      <div class="" >
      
          <label class="card">Card No: </label>
          <input type="text" id="card" name="card" class="form-control" style="width:350px">          
          <br><br>

          <div class="col-xs-12" style="margin-left:  -30px;">

          <div class="col-xs-6">

           <label class="month">Expiration Month: </label>
          <input type="text" id="month" class="month" class="form-control" style="width:150px">  
 </div>

<div class="col-xs-6" style="margin-left: -200px;">
           <label class="card">Expiration Year: </label>
          <input type="text" name="year" id="year" class="form-control" style="width:150px">

          </div>
 </div>

<br><br><br><br><br>

           <label class="card">CVV No: </label>
          <input type="text" name="cvv" id="cvv" class="form-control" style="width:350px"> <br>   


      </div>


    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
     
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
       </div>
    
  </div>

<br> <hr><br>
   <ul id="detailtab">
    <li><a>Contact Details</a></li>
  </ul>

  <div class="tab-content">
    <br>
  <div id="home class="tab-pane fade in active">


          <div class="col-xs-12" style="margin-left:  -30px;">

          <div class="col-xs-6">

           <label class="month">Email: </label>
          <input type="text" name="email"  id="email" class="form-control" style="width:250px">  
 </div>

<div class="col-xs-6">
           <label class="card">Mobile: </label>
          <input type="text" name="mobile" id="mobile" class="form-control" style="width:250px">   <br>  

          </div>
 </div>

      
      

  </div>

  </div>




</div>



<div class="col-md-3">



<h3>{{ Session::get('moviename') }} </h3>
<hr>


<p>Theater</p>
<h4>{{ Session::get('hallname') }}</h4>
<p>{{ Session::get('location') }}</p>

<br><br>


<p>Showtime</p>



<h4>{{ Session::get('date') }} {{ Session::get('time') }}</h4>

<hr>


<section class="cost">

<h4><strong>Total Ticket  </strong><span style="float: right;">2</span></h4>

<h4><strong>Seat No.  </strong><span style="float: right;">{{ Session::get('ticket') }}</span></h4>

<h4><strong>Price  </strong><span style="float: right;">Tk. {{ Session::get('price') }}</span></h4>

<h4><strong>VAT(5%)  </strong><span style="float: right;">Tk. {{ Session::get('price') }}</span></h4>
</section>

<hr>

<h4><strong>Amount Payable  </strong><span style="float: right;">Tk. {{ Session::get('price') }}</span></h4>
</section>

<br>

<button type="submit" id="submit" class="btn btn-primary" id="countdown" style="font-size: 25px; padding: 10px 120px; border-radius: 0; margin-bottom: 20px;" >02:00</button>

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
                                        minutes :20,
                                        size : "lg"
                                    });
                                });
                            </script>
 


<script type="text/javascript">
  
$("body").on('DOMSubtreeModified', "#countdown", function() {
   
  var time=$('#countdown').html();

  console.log(time)

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










<script src="https://js.stripe.com/v3/"></script>
<script>
  
  var stripe = Stripe('pk_test_6pRNASCoBOKtIshFeQd4XMUh');


  var $form=$('#payment-form');

  $form.submit(function(event){

    $('payment-error').addClass('hidden');
    $form.find('button').prop('disabled',true);

  Stripe.card.createToken({
    number: $('#card').val(),
    cvc: $('#cvc').val(),
    exp_month: $('#month').val(),
    exp_year: $('#year').val(),
    email: $('#email').val(),
    phone: $('#phone').val()
  },stripeResponseHandler);

  return false;

  });
</script>



























@endsection





