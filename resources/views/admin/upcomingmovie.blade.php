@extends('layouts.admin')

@section('content')

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <div class="container" style="width: auto;">

   
     <br> 
   
    <div class="col-md-12">


        <div class="row">

   

        <div class="col-md-11" id="users">
        <div class="panel panel-primary"  style="margin: 20px 20px;">



            <div class="panel-heading">


            </div>
          <div class="panel-body">

     


              <ul section="bc" id="suv" >
    <li>
      <a href="/admin/movie">All Movie</a>
    </li>
    </ul>


              <ul  section="bc" id="suv" >
    <li>
      <a>Upcoming Movie</a>
    </li>
    </ul>


           <a href="/admin/addupcomingmovie" class="new" style="float: right; margin-right: 10px;">
          <span class="glyphicon glyphicon-plus"></span> Movie 
        </a>


        <input type="text"  id="search" style="margin: 7px 10px; padding: 5px 5px;" name=""  placeholder="Search Movie..">


          <br><br><br>

            <table class="table table-bordered">
              <thead>
                <th>S.N</th>
                <th>Movie Title</th>
                 <th>Movie Director</th>
                <th>Movie Genre</th>
                <th>Relase</th>
                <th>Event</th>
                <th>Actions</th>
              </thead>
              <?php $i = 0 ?>
              <tbody>
                  
                  @foreach($movie as $data)
                   <?php $i++ ?>
                <tr class="data{{$data->id}}">
                 
                  <td>{{ $i}}</td>
                  <td class="mname{{$data->id}}">{{ $data->movie_name }}</td>
                  <td class="mdirector{{$data->id}}">{{ $data->director }}</td>
                  <td class="mgenres{{$data->id}}">{{ $data->genres }}</td>
                  <td class="mdate{{$data->id}}">{{ $data->relaseDate }}</td>
                   <td><a href="/admin/addmovielist/{{$data->id}}" class="view">Add Movie List</a></td>                  
                  <td>
                  <span class="details{{$data->id}}" style="display: none;"  data-cast="{{$data->cast}}" data-poster="\{{$data->poster}}"   data-musicDirector="{{$data->musicDirector}}" data-about="{{ $data->aboutMovie }}" ></span>

                    <a href="" class="btn btn-success" id="viewdata"  data-id="{{$data->id}}" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="{{$data->id}}" data-name="{{ $data->movie_name }}" data-genres="{{ $data->genres }}" data-date="{{ $data->relaseDate }}" ><span class="glyphicon glyphicon-pencil"> </span></a>
                    <a href="" data-toggle="modal" id="deletedata" data-target="#delete" data-id="{{$data->id}}" class="btn btn-danger" style="border-radius: 0;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                  </td>
                </tr>
                  @endforeach 

              </tbody>
            </table>
          </div>
        </div>
            </div>
          </div>






    </div>  
  </div>




















<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Movie Detail</h4>
      </div>
          <div class="modal-body" id="viewmovie">
          
           <div class="movieimage" style="float: right;">
                <img src="" class="movieposter" height="220px" width="220px">
           </div>
           
       <p itemtype="http://schema.org/Person">Movie Name : 
      <span itemprop="name" class="moivename"> </span></p><br>
       <p itemtype="http://schema.org/Person">Movie Genres: 
      <span itemprop="name" class="moivegenres"> </span></p><br>
       <p itemtype="http://schema.org/Person">Relase Date: 
      <span itemprop="name" class="moivedate"> </span></p><br>
       <p itemtype="http://schema.org/Person">Cast: 
      <span itemprop="name" class="moivecast"> </span></p><br>
       <p itemtype="http://schema.org/Person">Movie Director: 
      <span itemprop="name" class="moivedirector"> </span></p><br>

       <p itemtype="http://schema.org/Person">Movie Music Director: 
      <span itemprop="name" class="moivemusicdirector"> </span></p><br>


       <p itemtype="http://schema.org/Person">About Movie: 
      <span itemprop="name" class="moiveabout"> </span></p><br>

     

      </div>
          
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    


















<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Movie Detail</h4>
      </div>
          <div class="modal-body">
          
          <label for="email">Movie Name : </label>
          <div class="form-group">
        <input class="form-control "  id="name" value="" type="text" >
        </div>

        <label for="email">Movie Genres : </label>
        <div class="form-group">
        <input class="form-control " id="genres" value="" type="text" >
        </div>

        <label for="email">Relase Date : </label>
        <div class="form-group">
        <input class="form-control "  id="date" value="" type="date" >
        </div>
       

        <div class="form-group">
        <textarea rows="2" class="form-control" ></textarea>
    
        </div>

      </div>
          <div class="modal-footer ">
        <input type="submit" data-id=""  id="submits" class="btn btn-warning btn-lg" style="width: 100%;">
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    








      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete Movie</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Movie?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" id="deletes" data-id="" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>














<script type="text/javascript">
  

  $(document).ready(function(){

$(document).on('click', '.btn', function(e) {


       var id=$(this).attr("data-id");
        var name=$(this).attr("data-name");
        var genres=$(this).attr("data-genres");
        var date=$(this).attr("data-date");

          
        $("#name").val(name);
        $("#genres").val(genres);
        $("#date").val(date);

      
     $("#submits").attr("data-id",id);




});




     
       

$(document).on('click', '.btn', function(e) {


      var id=$(this).attr("data-id");

     $("#deletes").attr("data-id",id);

   

});





     
      
$(document).on('click', '#deletes', function(e) {
      var id=$(this).attr("data-id");

          $.ajax({
            type: 'get',
            url: '/admin/deleteUpcomingMovie',
            data: {
                'id': id
            },
      success: function(data) {
                $('.data' + id).remove();
                  $('#delete').modal('hide');
            }
        });

});






});



</script>

<script type="text/javascript">
  
    $(document).on('click', '#submits', function(e) {
    e.preventDefault();

      
    var name=$("#name").val();
    var genres=$("#genres").val();
    var date=$("#date").val();  
    var id=$(this).attr('data-id');


   
     $.ajax({
            type: 'get',
            url: '/admin/editUpcomingMovie',
            data: {
                'id': id,'name':name,'genres':genres,'date':date
            },
      success: function(data) {


                  $(".mname"+id).html(name); 
                  $(".mgenres"+id).html(genres); 
                  $(".mdate"+id).html(date); 

                  $('#edit').modal('hide');
                  return false;
            }
        });





  

});


</script>








<script type="text/javascript">
  

  
  $(document).on('click', '.btn', function(e) {
    e.preventDefault();


      var id=$(this).attr("data-id");

      var name=$(".mname"+id).html();
      var genres=$(".mgenres"+id).html();
      var date=$(".mdate"+id).html();
      var director=$(".mdirector"+id).html();
      
      var cast=$(".details"+id).attr("data-cast");
      var poster=$(".details"+id).attr("data-poster");
      var musicDirector=$(".details"+id).attr("data-musicDirector");
      var about=$(".details"+id).attr("data-about");
     

        $(".moivename").html(name);
        $(".moivegenres").html(genres);
        $(".movieposter").attr('src',poster);
        $(".moivedate").html(date);
        $(".moivecast").html(cast);    
        $(".moivedirector").html(director);  
        $(".moivemusicdirector").html(musicDirector);  
        $(".moiveabout").html(about); 



});

</script>




<script type="text/javascript">
  
$(document).ready(function(){
   $("#search").on("input",function ()  {
       

       var str=  $("#search").val();


            $.ajax({

                type: 'get',
                url: '/searchmovie',
                dataType:'JSON',
                data:{'search':str},

                success:function(data){

                     if(data===''){

                      $('tbody').html(data);

                     }
                     else{
                      $('tbody').html(data);
                     }


                }

            });

     





   });  
}); 
</script>




      











  
@endsection
