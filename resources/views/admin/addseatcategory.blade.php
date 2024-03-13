@extends('layouts.admin')

@section('content')

    
    <br><br>
        <div class="container" style="width: auto;">

             

        <div class="col-md-12 ">

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
      <a href="/admin/seatdistribution/{{$id}}">Seat Distribution</a>
    </li>
    </ul>


                    <ul section="bc" id="suv" >
    <li>
      <a>Add Category</a>
    </li>
    </ul>


    <br><br><br>
						{!! Form::open(['url' => 'addseatcategory', 'method' => 'POST','files' => true]) !!}
  
              <td>
              {{ Form::label('name', 'Category Name') }}
              {{ Form::input('text', 'name', null, ['class' => 'form-control', 'required']) }}
              </td>

                 {{ Form::hidden('id', $id) }}
  						
              <br>


              <td>
              {{ Form::label('time', 'Price') }}

              {{ Form::input('text', 'price', null, ['class' => 'form-control', 'required']) }}
              </td>
  					
              <br>

  						<td>
  						{{ Form::input('submit', 'submit', null, ['class' => 'btn btn-primary']) }}
  						</td>

						{!! Form::close() !!}
                    

				 </div>
			
		</div>


             </div>
      
    </div>







 

@endsection
