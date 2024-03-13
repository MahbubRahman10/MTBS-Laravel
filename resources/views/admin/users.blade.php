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

                 <ul section="bc" id="suv"  style="float: left; v=background: white;    padding: 8px 15px; margin-bottom: 20px;list-style: none;background-color: #f5f5f5;border-radius: 4px; font-size: 20px;">
    <li>
      <a>All user</a>
    </li>
    </ul>
  



         <input type="text"  id="search"  style="margin: 7px 10px; padding: 5px 5px;" name=""  placeholder="Search User..">


          <br><br><br>


            <table class="table table-bordered">
              <thead>
                <th>S.N</th>
                <th>User Name</th>
                 <th>Email</th>
                <th>Contact Number</th>
                <th>Join Date</th>
                <th>Action</th>
              </thead>
              <tbody>
                  <?php $i = 0 ?>
                  @foreach($user as $data)
                <tr class="data{{$data->id}}">
                  <?php $i++ ?>
                  <td>{{ $i}}</td>
                  <td class="uname{{$data->id}}">{{ $data->name}}</td>
                  <td class="uemail{{$data->id}}">{{ $data->email}}</td>
                  <td class="umobile{{$data->id}}">{{ $data->mobile}}</td>
                  <td class="udate{{$data->id}}">{{ Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</td>                
                  <td>


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


  









 <!-- /.Delete -->

   <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete Movie</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure want to remove this User?</div>
       
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
            url: '/admin/deleteUser',
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
  
$(document).ready(function(){
   $("#search").on("input",function ()  {
       

       var str=  $("#search").val();


            $.ajax({

                type: 'get',
                url: '/UserSearch',
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
