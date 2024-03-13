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
      <a>All Theater</a>
    </li>
    </ul>


           <a href="/admin/addtheater" class="new" style="float: right; margin-right: 10px;">
          <span class="glyphicon glyphicon-plus"></span> Theater 
        </a>


                <input type="text"  id="search" style="margin: 5px 10px; padding: 5px 5px;" name=""  placeholder="Search Theater..">


          <br><br><br>




            <table class="table table-bordered">
              <thead>
                <th>S.N</th>
                <th>Theater Name</th>
                 <th>Theater Location</th>
                <th>City</th>
                <th>Phone</th>             
                 <th>Screens</th>
                
                <th>Actions</th>
              </thead>
              <tbody>
                  <?php $i = 0 ?>
                  @foreach($theater as $data)
                <tr class="data{{$data->id}}">
                  <?php $i++ ?>
                  <td>{{ $i}}</td>
                  <td class="tname{{$data->id}}"> {{ $data->hname }}</td>
                  <td class="tlocation{{$data->id}}">{{ $data->location }}</td>
                  <td class="tcity{{$data->id}}">{{ $data->city }}</td>
                  <td class="tphone{{$data->id}}">{{ $data->phone }}</td> 
                  <td><a href="/admin/screens/{{ $data->id }}" class="view">View Screens</a></td>
                     
                  <td>

                       <a href="" class="btn btn-success" id="viewdata"  data-id="{{$data->id}}" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>


                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="{{$data->id}}" data-name="{{ $data->hname }}" data-location="{{ $data->location }}" data-city="{{ $data->city }}" data-phone="{{ $data->phone }}"><span class="glyphicon glyphicon-pencil"> </span></a>


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
           
       <p itemtype="http://schema.org/Person">Theater Name : 
      <span itemprop="name" class="theatername" style="font-size: 15px;"> </span></p><br>
       <p itemtype="http://schema.org/Person">Location: 
      <span itemprop="name" class="theaterlocation"  style="font-size: 15px;"> </span></p><br>
       
       <p itemtype="http://schema.org/Person">City: 
      <span itemprop="name" class="theatercity"  style="font-size: 15px;"> </span></p><br>
       
       <p itemtype="http://schema.org/Person">Contact Number: 
      <span itemprop="name" class="theaterphone"  style="font-size: 15px;"> </span></p><br>
       

      
     

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
        <h4 class="modal-title custom_align" id="Heading">Edit Movie Detail</h4>
      </div>
          <div class="modal-body">
          
          <label for="email">Theater Name : </label>
          <div class="form-group">
        <input class="form-control "  id="name" value="" type="text" >
        </div>

        <label for="email">Location : </label>
        <div class="form-group">
        <input class="form-control " id="location" value="" type="text" >
        </div>

        <label for="email">City : </label>
        <div class="form-group">
        <input class="form-control " id="city" value="" type="text" >
        </div>

        <label for="email">Contact Number : </label>
        <div class="form-group">
        <input class="form-control "  id="phone" value="" type="text" >
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
        var location=$(this).attr("data-location");
        var city=$(this).attr("data-city");
        var phone=$(this).attr("data-phone");

          
        $("#name").val(name);
        $("#location").val(location);
        $("#city").val(city);
        $("#phone").val(phone);

      
     $("#submits").attr("data-id",id);


   




});


});



</script>



<script type="text/javascript">
  

  
  $(document).on('click', '.btn', function(e) {
    e.preventDefault();


      var id=$(this).attr("data-id");

      var name=$(".tname"+id).html();
      var location=$(".tlocation"+id).html();
      var city=$(".tcity"+id).html();
      var phone=$(".tphone"+id).html();
      


        $(".theatername").html(name);
        $(".theaterlocation").html(location);
        $(".theatercity").html(city);
        $(".theaterphone").html(phone); 
     


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
            url: '/admin/deleteTheater',
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

      
    var name=$("#name").val();
    var location=$("#location").val();
    var city=$("#city").val();
    var phone=$("#phone").val();  
    var id=$(this).attr('data-id');


   
     $.ajax({
            type: 'get',
            url: '/admin/editTheater',
            data: {
                'id': id,'name':name,'location':location,'city':city,'phone':phone
            },
      success: function(data) {


                  $(".tname"+id).html(name); 
                  $(".tlocation"+id).html(location); 
                  $(".tcity"+id).html(city); 
                  $(".tphone"+id).html(phone); 

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
                url: '/TheaterSearch',
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
