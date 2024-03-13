@extends('layouts.master')

@section('content')

<br><br><br><br>

 <div class="container">
                <div class="col-md-12">
                    <div class="row">

 <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" id="nav-tabs" role="tablist">
                                        <li ><a href="/users/{{  Auth::user()->id }}/profile" >Profile</a></li>
                                        <li role="presentation" class="active"><a aria-controls="home" role="tab" data-toggle="tab">Book</a></li>
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

@if(count($book)!=0)


<table class="table table-bordered" style="width: 95%;">
              <thead>
                <th>Token</th>
                 <th>Movie</th>
                <th>Theater</th>
               <th>Payment</th>
                <th>Transaction ID</th> 
                <th>Ticket</th>
    
              </thead>
              <?php $i = 0 ?>
              <tbody>
                  
                  @foreach($book as $data)

                <tr class="data{{$data->bookId}}" >
  

                  <td>{{ $data->token }}</td>
                  <td>{{ $data->movie_name }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->payment_type }}</td>
                  <td>{{ $data->transaction_id }}</td>
            
                   <td>  </td>
                </tr>
                  @endforeach 

              </tbody>
            </table>

@else


    <h4>You don't have any Book</h4>

    @endif




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

