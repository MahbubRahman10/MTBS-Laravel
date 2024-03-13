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
      <a href="/admin/movie">All Movie</a>
    </li>
    </ul>


              <ul  section="bc" id="suv" >
    <li>
      <a>Upcoming Movie</a>
    </li>
    </ul>
    <br><br><br>



						{!! Form::open(['url' => 'addmovie', 'method' => 'POST','files' => true]) !!}
  
  						<td>
	  						{{ Form::label('name', 'Movie Name') }}

	  						{{ Form::input('text', 'name', null, ['class' => 'form-control', 'required']  ) }}
  						</td>
              <br>
  						

              <td>
                {{ Form::label('name', 'Language') }}

                {{ Form::input('text', 'language', null, ['class' => 'form-control', 'required']  ) }}
              </td>
              <br>



              <td>
                {{ Form::label('name', 'Country') }}

                {{ Form::input('text', 'country', null, ['class' => 'form-control', 'required']  ) }}
              </td>
              <br>




  						<td>
  						{{ Form::label('genre', 'Movie Genre') }}

  						{{ Form::input('text', 'genre', null, ['class' => 'form-control', 'required']) }}
  						</td>

              <br>

  						<td>
  						{{ Form::label('Relase Date', 'Relase Date') }}

  						{{ Form::input('date', 'rdate', null, ['class' => 'form-control', 'required']) }}
  						</td>
  						  <br>

  						<td>
  						{{ Form::label('IDMb Rating', 'IDMb Rating') }}

  						{{ Form::input('text', 'rating', null, ['class' => 'form-control', 'required']) }}
  						</td>

                <br>


  						<td>

  						{{ Form::label('poster', 'Movie Poster') }}
  						{{ Form::file('image', ['class' => 'form-control', 'required']) }}
  						</td>


                <br>


              {{ Form::label('poster', 'Movie Trailer') }}
              {{ Form::input('text', 'trailer', null, ['class' => 'form-control', 'required']) }}
              </td>


                <br>


  						</td>

  						{{ Form::label('Cast', 'Cast') }}

  						{{ Form::input('text', 'cast', null, ['class' => 'form-control', 'required']) }}
  						</td>


                <br>


  						<td>
  						{{ Form::label('Director', 'Director') }}

  						{{ Form::input('text', 'director', null, ['class' => 'form-control', 'required']) }}
  						</td>


                <br>


  						<td>
  						{{ Form::label('Music Director', 'Music Director') }}

  						{{ Form::input('text', 'mdirector', null, ['class' => 'form-control', 'required']) }}
  						</td>

                <br>


  						<td>
  						{{ Form::label('about', 'About Movie') }}

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
