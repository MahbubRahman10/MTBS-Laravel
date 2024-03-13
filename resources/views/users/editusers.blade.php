@extends('layouts.master')

@section('content')

<br><br><br><br>

 <div class="container">
                <div class="col-md-12">
                    <div class="row">

 <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" id="nav-tabs" role="tablist">
                                        <li><a href="/users/{{  Auth::user()->id }}/profile" >Profile</a></li>
                                        <li ><a href="/users/book">Book</a></li>
                                        <li role="presentation" class="active"><a>Edit Profile</a></li>
										<li role="presentation"><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">SignOut</a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></a></li>
                                    </ul>

                                    <!-- Tab panes -->


                                        <div role="tabpanel" class="tab-pane active" id="home">

										 <div class="container">
                                        	<div class="col-md-12">
                                        			<div class="row">


													
														<div class="col-md-4" id="info">


												
                                        		      
                    <form method="post" action="/usersedit">
                      {{ csrf_field() }}
                        
                     <label>Name : </label>   
                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="">

                    <br>
                     <label>mobile : </label>   
                    <input type="text" class="form-control" name="mobile" value="{{Auth::user()->mobile}}" placeholder="">
                    <br>
                    <button class="btn btn-primary">Edit</button>


                    </form>   
												
												
                                                <br>


                                                
											



                                        	</div>
													
													
													
													
													
													
													
															</div>
															</div>
															</div>
															
											@if(Auth::user()->method == "Email")
														<hr>


										 <div class="container">
                                        	<div class="col-md-12">
                                        			<div class="row">


													
														<div class="col-md-4" id="info">

														
														
													<h5 style="margin-left: 00px;"><strong>Change Password </strong></h5>
																
													<div class="passwords">
														
														<form method="post" action="/changepassword" style="margin-left: 00px;">
														<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
																<br>
																<h6><label>Old Password :</label></h6>
																

																<div>

																<input  type="password" class="form-control" name="oldpassword" required style="width: 220px;">

																@if ($errors->has('oldpassword'))
																	<span class="help-block">
																	<strong style="color: red;">{{ $errors->first('oldpassword') }}</strong>
																	</span>
																	@endif

																</div>


																<br>

																<h6><label>New Password :</label></h6>
																


													<div>
													<input type="password" class="form-control" name="password" required style="width: 220px;">

													@if ($errors->has('password'))
													<span class="help-block">
													<strong style="color: red;">{{ $errors->first('password') }}</strong>
													</span>
													@endif
													</div>
														<br>






																<h6><label>Re-Password :</label></h6>
																




																<div>

																<input type="password" class="form-control" name="password_confirmation" required style="width: 220px;">

																</div>

																<br>
																<button class="btn btn-primary">Change</button>
															</form>
	
	</div>
															</div>
															</div>
															</div>
															</div>
															
															
														@endif
															
															
															
															
															
															</div>		
															</div>


</div>
															</div>		
															</div>

															
															
															
															
															
																
															
															
															
															
															
															
															
															
															
															
															
															
															
															
															
															
															
															
															
															
															
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>

@endsection