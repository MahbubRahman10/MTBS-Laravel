@extends('layouts.master')

@section('content')


<br><br><br>

<div class="container" >
<div class="col-md-12">

	<div class="col-md-6">

		
	   <object width="450" height="350" data="{{ $movie->trailer }}" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/Ahg6qcgoay4" /></object>
	
	</div>	




	<div class="col-md-6" id="info">


	<h2>{{ $movie->movie_name }}</h2>
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

	

				<br><br>



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