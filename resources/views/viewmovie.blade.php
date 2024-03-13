@extends('layouts.master')

@section('content')


<br><br><br>

<div class="container" >
<div class="col-md-12">

	<div class="col-md-6">

		
	   <object width="450" height="350" data="{{ $movie->trailer }}" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/Ahg6qcgoay4" /></object>
	
	</div>	




	<div class="col-md-6" id="info">


	<h2>{{ $movie->name }}</h2>
    <p style="font-style: italic; margin-top:-10px; color: black; ">{{ $movie->genres }}</p>

    <div class="movie-casts tn-entity-short-details">
	   	
    	<p itemprop="actor" itemscope="" itemtype="http://schema.org/Person">Relase Date: 
	   	<span itemprop="name">{{ $movie->relaseDate }}</span>
	   	<p itemprop="actor" itemscope="" itemtype="http://schema.org/Person">Cast: 
	   	<span itemprop="name">{{ $movie->cast }}</span>
	    </p>
	   	<p itemprop="director" itemscope="" itemtype="http://schema.org/Person">Director: 
	   	<span itemprop="name">{{ $movie->director }}</span> </p><p itemprop="musicBy" itemscope="" itemtype="http://schema.org/Person">Music Director:
	   	<span itemprop="name">{{ $movie->musicDirector }}</span>
	   	</p>

	   	<h5>About Movie</h5>
	   	
	   	<p>{{ $movie->aboutMovie }}</p>

	   	



   </div>
	


	</div>	



</div>

</div>	



<br>
<br>
<br>

	<div class="container">
		<div class="col-md-12">

<?php 
		use Carbon\Carbon;
		
		$t = Carbon::now();
		$t1=Carbon::now()->format('Ymd');

		$m=($t1+1);$m2=($t1+2);$m3=($t1+3);

		$d1="view/$name/$id/$t1";
		$d2="view/$name/$id/$m";
		$d3="view/$name/$id/$m2";
		$d4="view/$name/$id/$m3";

	

	?>

	


  <ul class="nav nav-tabs">

    <li {{{ (Request::is($d1) ? 'class=actives' : '') }}} ><a href="/view/{{ $name }}/{{ $movie->id }}/{{$t1}}">Today {{Carbon::now()->format('d ')}}</a></li>

    <li {{{ (Request::is($d2) ? 'class=actives' : '') }}}><a href="/view/{{ $name }}/{{ $movie->id }}/{{$t1+1}}"><?php echo $t->addDay(1)->format('d D');  ?></a></li>
    <li {{{ (Request::is($d3) ? 'class=actives' : '') }}}><a href="/view/{{ $name }}/{{ $movie->id }}/{{$t1+2}}"><?php echo $t->addDay(1)->format('d D');  ?></a></li>
    <li {{{ (Request::is($d4) ? 'class=actives' : '') }}}><a  href="/view/{{ $name }}/{{ $movie->id }}/{{$t1+3}}"><?php echo $t->addDay(1)->format('d D');  ?> </a></li>

    

  </ul>

 








</div>




				<br><br><br><br>

				@foreach($show as $data)




				<div class="col-md-12" id="searchdata" style=" border-bottom: 1px solid #eee;">

				
					<div class="col-md-4" >

						<h4>{{ $data->hname }}</h4>
						<p>{{ $data->city }}</p>

					</div>


					<div class="col-md-8">

					@foreach($showss as $datas)


						@if($datas->cinemahall_id == $data->cinemahall_id)
						<ul class="date" style="display: inline-block;">
							
							<?php 

							$t1=Carbon::now()->format('g:i A');

							?>

							@if( $date==$datas->date || $t1 < Carbon::parse($datas->time)->format('g:i A')  )

							<li><a href="/book/{{$name}}/{{ $datas->id }}">{{ $datas->time }}</a></li>
							@endif
						</ul>
						@endif

					@endforeach
					
					
					</div>

				

				</div>

				@endforeach
					


				<br><br><br><br><br>








</div>
	

				<br><br><br><br><br>



<script type="text/javascript">
  
$(document).ready(function(){
   $("#search").on("input",function ()  {
       var str=  $("#search").val();
            $.ajax({

                type: 'get',
                url: '/moviesearch',
                dataType:'JSON',
                data:{'search':str},

                success:function(data){

                     if(data===''){
                     }
                     else{
                      $('#searchdata').html(data);
                     }
                }

            });
   });  
}); 
</script>




      









@endsection