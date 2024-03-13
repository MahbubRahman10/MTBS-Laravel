@extends('layouts.master')

@section('content')


<br><br><br>

<div class="container" style=" ">











<div class="col-md-9" style=" max-height: 1000px;overflow-y: scroll;">

	<hr>

	<center>
	<h4 style="display: inline-block; padding: 0px 15px;"><span style="color: black; border-color:#eee; border:1px; border-style:solid; border-color:#757575; padding: 2px 10px; margin-right: 10px;"></span> Avaiable</h4>
	<h4  style="display: inline-block;"><span style="color: white;border:1px; border-style:solid; border-color:#eee; padding: 2px 10px; margin-right: 10px; background:#757575; " ></span>  Booked</h4>
	</center>
	<hr> <br>


@foreach($type as $datas)

				@foreach ($Seatdistribution as $value)
				

				@if($value->id==$datas->seatdistributon_id)
			<h4 style="text-align: center;"> {{ $datas->type }} | Tk.<span class="price">{{ $value->price }}</span> </h4>
				@endif
				@endforeach
			<hr>
			<br>
			


			<table>
				@foreach($result as $data)
				<tbody class="sss" >
					
				<tr>


				@if( $datas->type == $data->type )



				<th style="padding: 9px 20px; font-size: 20px;">{{ $data->row }}</th>
					@for($j=1; $j <= $data->number; $j++) 

					<?php  $y=$data->row; $z=$j;  $add="$y$z"; ?>

					@if(in_array($add, $booked))

				<td style="padding: 00px 10px; font-size: 20px;"> <a style="color: white;border:1px; border-style:solid; border-color:#eee; padding: 6px 10px; background:#757575; " class="" >{{$j}}</a></td>


					@else


					<td style="padding: 00px 10px; font-size: 20px;"> <a href="" id="seatcol{{$data->row}}{{$j}}"  style="color: black; border-color:#eee; border:1px; border-style:solid; border-color:#757575; padding: 6px 10px;" class="ssss" id="seat{{$data->row}}{{$j}}" data-seat="{{$data->row}}{{$j}}" data-price="120" status="0" > {{$j}}</a></td>



					@endif


					


					@endfor

				@endif

		
					
				</p>				
				</tr>
				</tbody>
				@endforeach

			</table>	

	
			
	

			
		

			


	<br>
	
@endforeach



 </div>



<div class="col-md-3">


@foreach($detail as $data)


<h2>{{ $show->movie_name}}</h2>
<p>{{ $movie->language}} | {{ $movie->genres}}</p>
<hr>

<p>Theater</p>
<h3>{{ $data->hname }}</h3>
<h4>{{ $data->tname }}</h4>
<h4>{{ $data->location }}</h4>


<br>
<br>

<p>Showtime</p>

<h4>{{ Carbon\Carbon::parse($show->date)->format('D, d-m-Y') }} {{$show->time}}</h4>



@endforeach


<hr>



<ul class="booked" style="list-style: none; padding: 10px 10px;">
	
</ul>
<h4><span class="seat">0</span> Seat(s) <p style="padding: 0px 20px; display: inline-block; color: #f48024;">Tk. <span class="total">0</span></p></span></h4>

<hr>

<form method="post" action="/book/{{ $show->movie_name}}/{{ $show->id}}/confirm/">
<input type="hidden" name="_token"  value="{!! csrf_token() !!}" />
<input type="submit" class="btn btn-primary" value="Continue"> 
<input type="hidden" class="conseat" name="seat" value="">
<input type="hidden" name="ticket" class="conticket" value="">

<a  style="display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;background: #d9534f; color: white;text-decoration: none;" href="\">Cancel</a>
</form>










</div>



















</div>

<br><br><br><br><br><br><br>



<script type="text/javascript">
  

  $(document).ready(function(){

var i;

$(".ssss").click(function (e) {
	  e.preventDefault();


       	 var id=$(this).attr("data-seat");
       	 var price=parseInt($(this).attr("data-price"));
       	 var status=$(this).attr("status");

       	 	 var m=$('.seat').html();
       	 var n=$('.total').html();

		  var seat=parseInt(m);
		  var total=parseInt(n);


		var datas=$('.conseat').val();
		



	var ids=id+',';

	if(datas.indexOf(id) == -1){
	

	$('.conseat').val(function(i,val) {     
                    		 return val + (val ? '' : '') + ids;         

	});


}
	else{

		var s=id+',';

			datas = datas.replace(s,'');
	

		
		$('.conseat').val(datas);




	}

	 

       	 if(status==0){

       	 	$("#seatcol"+id).css("background","#008080");
       	 	$("#seatcol"+id).css("border-color","#008080");
       	 	$("#seatcol"+id).css("color","white");
			
			$(this).attr("status","1");



	$(".booked").append('<li id=con'+ id +'>'+ id +'</li>');

			var total_seat=seat+1;
       		$('.seat').html(total_seat);

			var total_price=total+price;
       		$('.total').html(total_price);
       		$('.conticket').val(total_price);



       	 }
       	 else{


       	 		$("#seatcol"+id).css("background","white");
       	 		$("#seatcol"+id).css("border-color","#757575");

       	 		$("#seatcol"+id).css("color","black");
				$(this).attr("status","0");

				$('#con'+id).remove();


				var total_seat=seat-1;
	       		$('.seat').html(total_seat);

				var total_price=total-price;
       	 		$('.total').html(total_price);
       	 		$('.conticket').val(total_price);


       	 }






});





});

     

</script>









<script type="text/javascript">
	
	$(function(){

$('.btn').click(function(event){
var m=parseInt($('.seat').html());
if (m===0) {
    event.preventDefault();
    alert("Please select a seat")
}
});



});


</script>















@endsection



