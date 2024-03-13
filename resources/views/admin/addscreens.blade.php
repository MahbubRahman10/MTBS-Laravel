@extends('layouts.admin')

@section('content')

    
      
    <br><br>
        <div class="container" style="width: auto;">

                <div class="col-md-12 " >

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
      <a href="/admin/screens/{{$id}}">Screen</a>
    </li>
    </ul>
   
                    <ul section="bc" id="suv" >
    <li>
      <a>Add Screen</a>
    </li>
    </ul>

    <br><br><br>





						{!! Form::open(['url' => 'addscreens', 'method' => 'POST','files' => true]) !!}
  
  						<td>
	  						{{ Form::label('name', 'Screen Name') }}
	  						{{ Form::input('text', 'name', null, ['class' => 'form-control', 'required']  ) }}
  						</td>
              <td>

              {{ Form::hidden('id', $id) }}

              </td>

              <br>

  						
  						<td>
  						{{ Form::label('address', 'Total Seats') }}
  						{{ Form::input('text', 'seats', null, ['class' => 'form-control', 'required']) }}
  						</td>

              <br>
             


           





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
