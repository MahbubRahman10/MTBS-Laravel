@extends('layouts.admin')

@section('content')

         <div class="container" style="width: auto;">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
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
      <a href="/admin/seatdistribution/{{$theater}}">Seat Distribution</a>
    </li>
    </ul>

                 <ul section="bc" id="suv" >
    <li>
      <a>Seat</a>
    </li>
    </ul>
    


           <a href="/admin/addseat/{!!  $id !!}" class="new" style="float: right; margin-right: 10px;">
          <span class="glyphicon glyphicon-plus"></span> Seat
        </a>


           <input type="text"  id="search"  style="margin: 5px 10px; padding: 5px 5px;" name=""  placeholder="Search Seat..">


          <br><br><br>


            <table class="table table-bordered">
              <thead>
                <th>S.N</th>
                <th>Seat Type</th>
                 <th>Row</th>
                <th>Column</th>
                <th>Actions</th>
              </thead>
              <tbody>
                  <?php $i = 0 ?>
                  @foreach($seat as $data)
                <tr class="data{{$data->id}}">
                  <?php $i++ ?>
                  <td>{{ $i}}</td>
                  <td class="sname{{$data->id}}">{{ $data->type }}</td>
                  <td class="srow{{$data->id}}">{{ $data->row}}</td>
                  <td class="scolumn{{$data->id}}">{{ $data->number}}</td>            
                  <td>

                   <input type="hidden" class="cinema" value="{{ $data->type }}" name="">
                    <a href="" class="btn btn-success" id="viewdata"  data-id="{{$data->id}}" data-toggle="modal" data-target="#view" style=" border-radius: 0;"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>


                    <a href="" data-toggle="modal" data-target="#edit" class="btn btn-primary" style="border-radius: 0;" data-id="{{$data->id}}" data-name="{{ $data->type }}" data-row="{{ $data->row }}" data-column="{{ $data->number }}"><span class="glyphicon glyphicon-pencil"> </span></a>


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
        <h4 class="modal-title custom_align" id="Heading">Seat Detail</h4>
      </div>
          <div class="modal-body" id="viewmovie">
           
       <p itemtype="http://schema.org/Person">Seat Type : 
      <span itemprop="name"   class="seatname" style="font-size: 15px;"> </span></p><br>
       <p itemtype="http://schema.org/Person">Seat Row: 
      <span itemprop="name"   class="seatrow"  style="font-size: 15px;"> </span></p><br>
       <p itemtype="http://schema.org/Person">Seat Column : 
      <span itemprop="name"   class="seatcolumn" style="font-size: 15px;"> </span></p><br>

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
          
         
        <label for="email">Seat Row : </label>
        <div class="form-group">
        <input class="form-control " id="row" value="" type="text" >
        </div>

        <label for="email">Seat Column : </label>
        <div class="form-group">
        <input class="form-control " id="column" value="" type="text" >
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
        var row=$(this).attr("data-row");
         var column=$(this).attr("data-column");
          
        $("#row").val(row);
        $("#column").val(column);
      
     $("#submits").attr("data-id",id);


   




});


});



</script>



<script type="text/javascript">
  

  
  $(document).on('click', '.btn', function(e) {
    e.preventDefault();


      var id=$(this).attr("data-id");

      var name=$(".sname"+id).html();
      var row=$(".srow"+id).html();
      var column=$(".scolumn"+id).html();


        $(".seatname").html(name);
        $(".seatrow").html(row);
        $(".seatcolumn").html(column);


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
            url: '/admin/deleteSeat',
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
    var row=$("#row").val();
    var column=$("#column").val();
    var id=$(this).attr('data-id');

    
   
     $.ajax({
            type: 'get',
            url: '/admin/editSeat',
            data: {
                'id': id,'row':row,'column':column
            },
      success: function(data) {


                  $(".sname"+id).html(name); 
                  $(".srow"+id).html(row);
                  $(".scolumn"+id).html(column);

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

       var id= $(".cinema").val();


            $.ajax({

                type: 'get',
                url: '/SeatSearch',
                dataType:'JSON',
                data:{'search':str,'id':id},

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
