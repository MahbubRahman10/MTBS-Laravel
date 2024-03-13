@extends('layouts.master')

@section('content')



<div class="col-md-12" style="background: #F7F7F7;height: 500px;">


<br><br><br>

<div class="col-md-6" style="margin-left: 100px; height: 300px;" >
  
@foreach($theater as $data)

<h2 style="color: #212121; font-weight: 600;">{{ $data->hname }}</h2>


    <div class="movie-casts tn-entity-short-details">
      
      <p itemprop="actor" itemscope="" itemtype="http://schema.org/Person"><strong> Location: </strong> 
      <span itemprop="name">{{ $data->location }}</span>
      <p itemprop="director" itemscope="" itemtype="http://schema.org/Person"><strong> Contact Number: </strong> 
      <span itemprop="name">{{ $data->phone }}</span> </p>   

      
      



   </div>
  


@endforeach

</div>


<div class="col-md-6" style="width: 650px; height: 430px; margin-left: -100px;">




  {!! Mapper::render() !!}



</div>


  
</div>



  























<div class="container">
    <div class="col-md-12">

<?php 
    use Carbon\Carbon;
    
    $t = Carbon::now();
    $t1=Carbon::now()->format('Ymd');

    $m=($t1+1);$m2=($t1+2);$m3=($t1+3);

    $d1="Theater/$name/$t1";
    $d2="Theater/$name/$m";
    $d3="Theater/$name/$m2";
    $d4="Theater/$name/$m3";
    

  ?>


<br><br>
<br><br>
  


  <ul class="nav nav-tabs">

    <li {{{ (Request::is($d1) ? 'class=actives' : '') }}} ><a href="/Theater/{{ $name }}/{{$t1}}">Today {{Carbon::now()->format('d ')}}</a></li>

    <li {{{ (Request::is($d2) ? 'class=actives' : '') }}}><a href="/Theater/{{ $name }}/{{$t1+1}}"><?php echo $t->addDay(1)->format('d D');  ?></a></li>
    <li {{{ (Request::is($d3) ? 'class=actives' : '') }}}><a href="/Theater/{{ $name }}/{{$t1+2}}"><?php echo $t->addDay(1)->format('d D');  ?></a></li>
    <li {{{ (Request::is($d4) ? 'class=actives' : '') }}}><a  href="/Theater/{{ $name }}/{{$t1+3}}"><?php echo $t->addDay(1)->format('d D');  ?> </a></li>

    

  </ul>

 








</div>




        <br><br><br><br>

        @foreach($show as $data)



        <div class="col-md-12" style=" border-bottom: 1px solid #eee;">

        
          <div class="col-md-4" >

            <h4 style="padding: 10px 0px;">{{ $data->movie_name }}</h4>
       

          </div>


          <div class="col-md-8">

          @foreach($showss as $datas)


            @if($datas->cinemahall_id == $data->cinemahall_id)
            <ul class="date" style="display: inline-block;">


              <li><a href="/book/{{$name}}/{{ $datas->id }}">{{ $datas->time }}</a></li>

            </ul>
            @endif

          @endforeach
          
          
          </div>

        

        </div>

        @endforeach
          


        <br><br><br><br><br>








</div>
  






















<br><br><br><br><br><br><br>




@endsection





