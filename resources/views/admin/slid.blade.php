@extends('layouts.admin')

@section('content')
  
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <div class="container" style="width: auto;">

   
     <br> 
   
    <div class="col-md-12">


        <div class="row">

   
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  
   				   <div class="carousel-inner">

   		@foreach($slide as $data)

	<div class="item @if($data->active == '1'){{'active'}} @endif" >
        <img src="\{{$data->image}}" alt="Los Angeles" style="width:100%; height:250px;">
       
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



<br><br>

<div style="text-align: center;">

<a href="" id="viewdata" data-toggle="modal" data-target="#view" class="btn btn-primary" style="border-radius: 0; font-weight: 800; font-size: 30px; ">Add Slide</a>

</div>


<br><br><hr>

	
  			<h2 style="text-align: center; ">Slide Images</h2>
  	<div class="col-md-12" style="height: 700px;">

  		@foreach($slide as $data)
  		<div class="col-md-4">
  			
  			<img src="/{{$data->image}}" alt="Chicago" style="width:70%; height:170px;"><br><br>
        @if($data->active=='1')<a class="btn btn-primary" style="border-radius: 0; ">Active</a>@endif
  			<a href="/admin/deleteslide/{{$data->id}}" class="btn btn-danger" style="border-radius: 0; ">Remove</a>
  		</div>
  		@endforeach

  		
  	</div>


   

        </div>
    </div>

  </div>




<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Slide Image</h4>
      </div>
          <div class="modal-body" id="viewmovie">
          
          
           <form method="post" action="/admin/addslide" enctype="multipart/form-data">
           <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

           	<label>Add Slide</label>
           	<input type="file" name="image" class="form-control"><br>


 <label class="checkbox" style="margin-left: 20px;">
                <input type="checkbox" name="checkbox"> Active
 </label>


           	<button class="btn btn-primary"> Ok </button>

           </form>



      </div>
          
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
  
@endsection
