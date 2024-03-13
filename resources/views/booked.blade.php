@extends('layouts.master')

@section('content')

<br>



<div class="contaienr" >

<div class="tk">


<h1 style="text-align: center;font-weight: 100; font-size: 60px;">Thank You!</h1><br>


</div>


<h4 style="text-align: center;">Your Booking for <strong>{{Session::get('incidentData.name')}}</strong> on <strong>{{Session::get('incidentData.date')}}, {{Session::get('incidentData.time')}}</strong>  at <strong>{{Session::get('incidentData.cinemallname')}}</strong> are confirmded.</h4>

<br>
<h4 style="text-align: center;">Your Transaction Id: <strong>{{Session::get('incidentData.tid')}}</strong></h4>
<br>
<h4 style="text-align: center;">You can <strong> Download </strong> and <strong> Print </strong> your ticket from <a href="\ticket" style="color: red; font-weight: 700 ; font-size: 20px;">Here</a> </h4>



</div>



<br><br><br><br><br><br><br><br>


<script type="text/javascript">
  $(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });

</script>






@endsection





