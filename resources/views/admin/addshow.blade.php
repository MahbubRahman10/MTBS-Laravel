@extends('layouts.admin')

@section('content')
 
    <br><br>
        <div class="container" style="width: auto;">

                <div class="col-md-12" >

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
      <a href="/admin/show/{{$id}}">Schedule</a>
    </li>
    </ul>

               <ul section="bc" id="suv" >
    <li>
      <a>Add Schedule</a>
    </li>
    </ul>


    <br><br><br>





						{!! Form::open(['url' => 'addshow', 'method' => 'POST','files' => true]) !!}
  
             

  						<td>

              {!! Form::select('movie' , array('' => 'Select a movie') + $movie,null, ['class' => 'form-control'] ) !!}

  						</td>

                <td>

              {{ Form::hidden('id', $id) }}

              </td>

              <br>

  						
  						<td>
  						{{ Form::label('date', 'Show Date') }}
  						{{ Form::input('date', 'date', null, ['class' => 'form-control', 'required']) }}
  						</td>

              <br>

  						<td>
  						{{ Form::label('time', 'Show Time') }}

  						{{ Form::input('text', 'time', null, ['class' => 'form-control', 'required']) }}
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
