@extends('layouts.master')

@section('content')

<br><br><br><br>

 <div class="container">
                <div class="col-md-12">
                    <div class="row">

 <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" id="nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Profile</a></li>
                                        <li ><a href="/users/book">Book</a></li>
                                        <li role="presentation"><a href="/users/edit">Edit Profile</a></li>
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

                @if(session()->has('message'))
                    <div class="alert alert-success">
                    {{ session()->get('message') }}
                    </div>
                    @endif                                                          

												
                                        		<h4><span>Name:</span> {{ $user->name }}</h4><br>
												<h4><span>Email:</span>{{ $user->email }}</h4><br>
												<h4><span>Mobile:</span>  @if(Auth::user()->mobile){{ $user->mobile }} @else N/A @endif</h4><br>

												
												
                                                <br>


                                                




                                        	</div>
													
													
													
													
													
													
													
															</div>
															</div>
															</div>
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