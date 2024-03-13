@extends('layouts.master')

@section('content')

<br>



<div class="contaienr">
<div class="col-md-8">


<h3 style="margin-left: 100px; padding: 10px 10px;background: #337ab7; color: white; font-size: 25px; font-weight: 700; width: 44%;">Contact US</h3>
<br><br>

<form method="post" action="\message" style="margin-left: 100px;">
	{{ csrf_field() }}

		<label>Name : </label>
		<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus style="width: 50%;">

		@if ($errors->has('name'))
		<span class="help-block">
		<strong>{{ $errors->first('name') }}</strong>
		</span>
		@endif

		<br>

		<label>Email : </label>
		<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus style="width: 50%;">

		@if ($errors->has('email'))
		<span class="help-block">
		<strong>{{ $errors->first('email') }}</strong>
		</span>
		@endif


		<br>

		<label>Message : </label>
		<textarea id="description" class="form-control" name="description" value="{{ old('description') }}"  style="width: 50%;"></textarea>

		@if ($errors->has('description'))
		<span class="help-block">
		<strong>{{ $errors->first('description') }}</strong>
		</span>
		@endif

			<br>

			 <script src='https://www.google.com/recaptcha/api.js'></script>
        <div class="g-recaptcha" data-sitekey="6LeFpCUUAAAAAOUioXa31zlGk6XfBI-mwfNoC-kz" ></div> <br>


		<button class="btn btn-primary">Submit</button>

</form>








</div>
</div>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection





