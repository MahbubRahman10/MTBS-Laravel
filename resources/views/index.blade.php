@extends('layouts.master')

@section('content')





  <div id="myCarousel" class="carousel slide" data-ride="carousel">
   
    <!-- Indicators 
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      
   		@foreach($slide as $data)

	<div class="item @if($data->active == '1'){{'active'}} @endif" >
        <img src="\{{$data->image}}" alt="Los Angeles" style="width:100%; height:300px;">
       
      </div>


     

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
     @endforeach



  </div>

  </div>




<br><br><br>
<div class="container">
  <div class="col-md-12">

  <h2 class="currentmovie">NOW SHOWING</h2>

  <?php
  		use Carbon\Carbon;
		
		$t = Carbon::now()->format('Ymd');

  ?>
  

	@foreach($movie as $data)
	<div class="col-md-3">

		<a href="/view/{{ $data->name }}/{{ $data->id }}/{{$t}}" class="movie">
		
			<div class="movies" data-id="">
				<!-- cart reqirement -->
				<!-- product image -->					
				<div class="image"> <!-- product image -->
					<img id="img" src="{{ $data->poster }}" height="270" width="100%" style="padding: 2px 2px;"></img>	
				</div>

				<hr>

				<h5>{{ $data->name }}</h5>

				<hr>
				<!-- product details -->
				<div id="pri" class="pr" data-id="">		
					<h4>Book</h4><br>
				</div>
			</div>
		
		</a>
		
	</div>

		@endforeach




</div>
</div>



<br><br><br>
<div class="container">
  <div class="col-md-12">



<div id="create" class="col-lg-15 col-md-15 col-xs-12 col-sm-12 ac m-t20 m-b20">


			<h2>Upcoming Movie</h2>
@foreach($upcomingmovie as $data)
<div class="col-md-3">

		<a href="/movie/{{$data->movie_name}}" class="movie">
			<div class="movies" data-id="">
				<!-- cart reqirement -->
				<!-- product image -->					
				<div class="image"> <!-- product image -->
					<img id="img" src="/{{$data->poster}}" height="270" width="252"></img>	
				</div>

				<hr>

				<h5>{{$data->movie_name}}</h5>

				<hr>
				<!-- product details -->
				
			</div>
		</a>
</div>
@endforeach





</div>

</div>
</div>

<br><br><br><br><br>

<script>
  $(window).scroll(function () {
    $('#create').each(function (index,element) {
        var imagePos = $(this).offset().top;
        var topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow + 400) {
            $(this).delay(index*600).queue(function(){
                $(this).addClass("fadeIn").dequeue();
            });
        }
    });

});
</script>










@endsection