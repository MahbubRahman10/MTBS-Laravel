@extends('layouts.admin')

@section('content')

 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    <?php use Carbon\Carbon; ?>

    
    <br><br>
        <div class="container" style="width: auto;">
            
                <div class="col-md-12" >




                        <div class="col-md-3" id="newusers">


                        <i class="pull-left fa fa-users user1 icon-rounded" style="background-color: #6FB3E0;padding: 10px 10px; font-size: 30px; color: white; border-radius: 50%;"></i>

                            <div class="userinfo" style="margin-left: 75px;">

                                <h3 style="margin-top: 0px;"><strong> {{$user}} </strong></h3>
                                <span style="color: #999; font-size: 15px; ">New Users</span>                               
                            </div>

                        </div>
                        <div class="col-md-3" id="newvisitor">
                                

                        <i class="pull-left fa fa-eye" style="background-color: #1b926c;padding: 10px 10px; font-size: 30px; color: white; border-radius: 50%;"></i>

                            <div class="visitorinfo" style="margin-left: 75px;">

                                <h3 style="margin-top: 0px;"><strong> 1000 </strong></h3>
                                <span style="color: #999; font-size: 15px; ">New Visitor</span>                               
                            </div>


                        </div>


                        <div class="col-md-3" id="todayposts">

                                
                        <i class="pull-left fa fa-film" style="background-color: #a2d246;padding: 10px 10px; font-size: 30px; color: white; border-radius: 50%;"></i>

                            <div class="info" style="margin-left: 75px;">

                                <h3 style="margin-top: 0px;"><strong> {{$movie}} </strong></h3>
                                <span style="color: #999; font-size: 15px; ">Running Movie</span>                               
                            </div>


                        </div>

                        <div class="col-md-3" id="todayposts">

                                
                        <i class="pull-left fa fa-ticket" style="background-color: #a2d246;padding: 10px 10px; font-size: 30px; color: white; border-radius: 50%;"></i>

                            <div class="info" style="margin-left: 75px;">

                                <h3 style="margin-top: 0px;"><strong> {{$book}} </strong></h3>
                                <span style="color: #999; font-size: 15px; ">Today Book</span>                               
                            </div>


                        </div>
                     

                            
             </div>






               
            </div>
    
<br><br><br>


 <div class="container" style="width: auto;">
       <div class="col-md-12 " >

       <div class="col-md-6"> 

         {!! $chart->render() !!}


        </div>






<div class="col-md-6">
     
 
    {!! $u->render() !!}

</div>

 </div>

 </div>

<br><br><br>

<br>

 <div class="container" style="width: auto;">
       <div class="col-md-12 " >

       <div class="col-md-6"> 

         {!! $pie->render() !!}


        </div>






<div class="col-md-6" style="height: 440px;width: 500px; background: #eee; padding: 10px 10px; margin-left: 16px;">
     
 {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}

</div>

 </div>

 </div>











@endsection
