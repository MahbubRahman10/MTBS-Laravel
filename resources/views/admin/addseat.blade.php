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
      <a href="/admin/seatdistribution/{{$theater}}">Seat Distribution</a>
    </li>
    </ul>

                 <ul section="bc" id="suv" >
    <li>
      <a href="/admin/seat/{{$id}}">Seat</a>
    </li>
    </ul>



            <ul section="bc" id="suv" >
    <li>
      <a>All Seat</a>
    </li>
    </ul>

    <br><br><br>



						{!! Form::open(['url' => 'addseat', 'method' => 'POST','files' => true]) !!}
  
              

                 {{ Form::hidden('id', $id) }}
  						
          

  						
  						<td>
  						{{ Form::label('row', 'Row') }}
  						{{ Form::input('text', 'row', null, ['class' => 'form-control', 'required']) }}
  						</td>

              <br>

  						<td>
  						{{ Form::label('time', 'Column') }}

  						{{ Form::input('text', 'column', null, ['class' => 'form-control', 'required']) }}
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
