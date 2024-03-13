@extends('layouts.admin')

@section('content')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


         <div class="container" style="width: auto;">

   

   
    <div class="col-md-12">

        <div class="row">
        <div class="col-md-12" id="users">
        <div class="panel panel-primary"  style="margin: 20px 20px;">
            <div class="panel-heading">
            </div>
          <div class="panel-body">


                    <ul section="bc" id="suv" >
    <li>
      <a href="/admin/theater">Theater</a>
    </li>
    </ul>
  
               <ul section="bc" id="suv" >
    <li>
      <a href="/admin/screens/{{$screen}}">Screen</a>
    </li>
    </ul>

               <ul section="bc" id="suv" >
    <li>
      <a>Schedule</a>
    </li>
    </ul>



           <a href="/admin/addshow/{!!  $id !!}" class="new" style="float: right; margin-right: 10px;">
          <span class="glyphicon glyphicon-plus"></span> Show
        </a>

         <input type="text"  id="search"  style="margin: 5px 10px; padding: 5px 5px;" name=""  placeholder="Search Show..">


          <br><br><br>


            <table class="table table-bordered">
              <thead>
                <th>S.N</th>
                <th>Movie Name</th>
                 <th>Date</th>
                <th>Time</th>
                <th>Actions</th>
              </thead>
              <tbody>
                  <?php $i = 0 ?>
                  @foreach($show as $data)
                <tr class="data{{$data->id}}">
                  <?php $i++ ?>
                  <td>{{ $i}}</td>
                  <td class="sname{{$data->id}}">{{ $data->movie_name}}</td>
                  <td class="sdate{{$data->id}}">{{ $data->date}}</td>
                  <td class="stime{{$data->id}}">{{ $data->time}}</td>                
                  <td>




                   <a href="" class="btn btn-success" id="viewdata"  data-id="{{$data->id}}" data-name="{{$data->movie_name}}" data-date="{{$data->date}}" data-time="{{$data->time}}"  data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>


                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="{{$data->id}}" ><span class="glyphicon glyphicon-pencil"> </span></a>


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


  








  <!-- /.View --> 
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Theater Detail</h4>
      </div>
          <div class="modal-body" id="viewmovie">
           
       <p itemtype="http://schema.org/Person">Movie Name : 
      <span itemprop="name" class="moviename" style="font-size: 15px;"> </span></p><br>
      
       <p itemtype="http://schema.org/Person">Show Date: 
      <span itemprop="name" class="date"  style="font-size: 15px;"> </span></p><br>

             <p itemtype="http://schema.org/Person">Show Time: 
      <span itemprop="name" class="time"  style="font-size: 15px;"> </span></p><br>
       

      
     

      </div>
          
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    




















 <!-- /.Edit --> 
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Show Detail</h4>
      </div>
          <div class="modal-body">
          
          <label for="email">Movie Name : </label>
          <div class="form-group">
          <select name="name" class="form-control" >
            @foreach($movie as $data)
             <option value="{{$data->name}}"> {{$data->name}}</option><br><br><br>
            @endforeach
          
          </select> 
       
           </div>

        <label for="email">Show Date : </label>
        <div class="form-group">
        <input class="form-control "  id="date" value="" type="date" >
        </div>
       

        <label for="email">Show Time : </label>
        <div class="form-group">
        <input class="form-control "  id="time" value="" type="text" >
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
    










 <!-- /.Delete -->

   <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete Movie</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure want to delete this Show?</div>
       
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
        var name=$(".sname"+id).html();
        var date=$(".sdate"+id).html();
        var time=$(".stime"+id).html();


          
        $("#name").val(name);
        $("#date").val(date);
        $("#time").val(time);

      
     $("#submits").attr("data-id",id);


   




});


});



</script>



<script type="text/javascript">
  

  
  $(document).on('click', '.btn', function(e) {
    e.preventDefault();


      var id=$(this).attr("data-id");

    var name=$(this).attr("data-name");
    var date=$(this).attr("data-date");
  var time=$(this).attr("data-time");
      

        $(".moviename").html(name);
        $(".date").html(date);
        $(".time").html(time);

     


});

</script>







<script type="text/javascript">
  
$(document).on('click', '.btn', function(e) {


      var id=$(this).attr("data-id");

       $("#deletes").attr("data-id",id);



});

</script>




<script type="text/javascript">
  

     
       




  $(document).on('click', '#deletes', function(e) {
      var id=$(this).attr("data-id");

          $.ajax({
            type: 'get',
            url: '/admin/deleteShow',
            data: {
                'id': id
            },
      success: function(data) {
                $('.data' + id).remove();
                  $('#delete').modal('hide');
            }
        });

});


</script>





</script>

<script type="text/javascript">
  
    $(document).on('click', '#submits', function(e) {
    e.preventDefault();

      
    var name=$('select[name=name]').val()
    var date=$("#date").val();
    var time=$("#time").val();  
    var id=$(this).attr('data-id');

   
     $.ajax({
            type: 'get',
            url: '/admin/editShow',
            data: {
                'id': id,'name':name,'date':date,'time':time
            },
      success: function(data) {


                  $(".sname"+id).html(name); 
                  $(".sdate"+id).html(date); 
                  $(".stime"+id).html(time); 

                  $('#edit').modal('hide');
                  return false;
            }
        });





  

});


</script>









<script type="text/javascript">
  
$(document).ready(function(){
   $("#search").on("input",function ()  {
       

       var str=  $("#search").val();


            $.ajax({

                type: 'get',
                url: '/ShowSearch',
                dataType:'JSON',
                data:{'search':str},

                success:function(data){

                     if(data===''){



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
