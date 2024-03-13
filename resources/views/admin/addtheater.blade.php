@extends('layouts.admin')

@section('content')

    
    <br><br>
        <div class="container" style="width: auto;">

                <div class="col-md-12 " >

                <div class="panel panel-primary"  style="margin: 20px 20px;">



            <div class="panel-heading">



            </div>
          <div class="panel-body">
            
              <ul section="bc"   style="background: white;    padding: 8px 15px; margin-bottom: 20px;list-style: none;background-color: #f5f5f5;border-radius: 4px; font-size: 20px;">
          <li>
            <a href="/admin/theater">Theater ></a>
            <a>Add Theater</a>
          </li>
          </ul>





						{!! Form::open(['url' => 'addtheater', 'method' => 'POST','files' => true]) !!}
  
  						<td>
	  						{{ Form::label('name', 'Theater Name') }}
	  						{{ Form::input('text', 'name', null, ['class' => 'form-control', 'required']  ) }}
  						</td>

              <br>

  						
  						<td>
  						{{ Form::label('address', 'Theater Address') }}
  						{{ Form::input('text', 'address', null, ['class' => 'form-control', 'required']) }}
  						</td>

              <br>

  						<td>
  						{{ Form::label('city', 'City') }}

  						{{ Form::input('text', 'city', null, ['class' => 'form-control', 'required']) }}
  						</td>
  						  <br>

  						<td>
  						{{ Form::label('phone', 'Phone') }}

  						{{ Form::input('text', 'phone', null, ['class' => 'form-control', 'required']) }}
  						</td>


                <br>


                  <td>
              {{ Form::label('latitude', 'Latitude') }}

              {{ Form::input('text', 'latitude', null, ['class' => 'form-control', 'required']) }}
              </td>


                <br>


                  <td>
              {{ Form::label('longitude', 'Longitude') }}

              {{ Form::input('text', 'longitude', null, ['class' => 'form-control', 'required']) }}
              </td>


                <br>





  						<td>
  						{{ Form::label('about', 'About Theater') }}

  						{{ Form::textarea('about', null, ['class' => 'form-control', 'required']) }}
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
