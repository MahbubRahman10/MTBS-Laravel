<html>
<head>
	<title>HousefullBD Dashboard</title>

    <link rel="icon" type="image/png" href="/img/film-reel.png">

<link href="/css/bootstrap.min.css" type="text/css" rel="stylesheet">

<script src="/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="/css/admin.css">
	<meta name="viewpost" content="width=device-width, initial-scale: 1.0, user-scalabe=0">
	<script src="/js/jquery.min.js"></script>
	<link rel="stylesheet" href="/fonts/css/font-awesome.min.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.10.1/chartist.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/plottable.js/2.2.0/plottable.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.css"><style>
@-webkit-keyframes rotate-forever {
    0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
@-moz-keyframes rotate-forever {
    0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
@keyframes  rotate-forever {
    0% {
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
    }
    100% {
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        -ms-transform: rotate(360deg);
        -o-transform: rotate(360deg);
        transform: rotate(360deg);
    }
}
.loading-spinner {
    -webkit-animation-duration: 0.75s;
    -moz-animation-duration: 0.75s;
    animation-duration: 0.75s;
    -webkit-animation-iteration-count: infinite;
    -moz-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    -webkit-animation-name: rotate-forever;
    -moz-animation-name: rotate-forever;
    animation-name: rotate-forever;
    -webkit-animation-timing-function: linear;
    -moz-animation-timing-function: linear;
    animation-timing-function: linear;
    height: 60px;
    width: 60px;
    border-radius: 50%;
    display: inline-block;
}

</style>

<script type="text/javascript" src="https://cdn.rawgit.com/Mikhus/canvas-gauges/gh-pages/download/2.1.2/all/gauge.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.10.1/chartist.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="https://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<script type="text/javascript" src="https://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">google.charts.load('current', {'packages':['corechart', 'gauge', 'geochart', 'bar', 'line']})</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.7/highcharts.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.7/js/modules/offline-exporting.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highmaps/5.0.7/js/modules/map.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highmaps/5.0.7/js/modules/data.js"></script>
<script type="text/javascript" src="https://code.highcharts.com/mapdata/custom/world.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.6/raphael.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.2/justgage.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.6/raphael.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/plottable.js/2.8.0/plottable.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/progressbar.js/1.0.1/progressbar.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.11/c3.min.js"></script><script>
    $(function() {
        $('.charts').each(function() {
            var chart = $(this).find('.charts-chart');
            var loader = $(this).find('.charts-loader');
            var time = loader.data('duration');

            if(loader.hasClass('enabled')) {
                chart.css({visibility: 'hidden'});
                loader.fadeIn(350);

                setTimeout(function() {
                    loader.fadeOut(350, function() {
                        chart.css({opacity: 0, visibility: 'visible'}).animate({opacity: 1}, 350);
                    });
                }, time)
            }
        });
    })
</script>









  <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>


	<div id="container">
		<div class="sidebar" id="sidebar">
			<h4 class="logo"><a href="" style="color: white; font-weight: 700">Housefull<span style="color: orange; font-weight: 700">BD</span></a></h4>
			<ul id="nav">
				<li><a  @if(Request::url() === 'http://localhost:8000/admin') class="selected" @endif  href="\admin"><i class="fa fa-tachometer"></i>   Dashboard</a></li>
                <li><a @if(Request::url() === 'http://localhost:8000/admin/admin') class="selected" @elseif(Request::url() === 'http://localhost:8000/admin/viewadmin')  class="selected" @elseif(Request::url() === 'http://localhost:8000/admin/slide') class="selected" @else   class="csc" @endif  href="/admin/admin"><i class="glyphicon glyphicon-user"> </i>  Admin</a></li>

                <li><a @if(Request::url() === 'http://localhost:8000/admin/message') class="selected" @endif  href="/admin/message"> <i class="fa fa-envelope-open" aria-hidden="true"></i> Message(s) @if($messagestatus>0) <span class="messagestatus" style="float: right; background:  #6FB3E0; padding: 4px 10px;  font-weight: 700; color: white; border-radius: 10%;">{{ $messagestatus }}</span> @endif</a></li>
				
                <li><a @if(Request::url() === 'http://localhost:8000/admin/user') class="selected" @endif href="/admin/user"><i class="fa fa-users" aria-hidden="true"></i> Users</a></li>
				<li><a @if(Request::url() === 'http://localhost:8000/admin/movie') class="selected" @elseif(Request::url() === 'http://localhost:8000/admin/movie/upcoming')  class="selected" @elseif(Request::url() === 'http://localhost:8000/admin/addmovie') class="selected" @elseif(Request::url() === 'http://localhost:8000/admin/addupcomingmovie') class="selected" @else   class="csc" @endif href="/admin/movie"><i class="fa fa-film" ></i> Movie</a></li>
				
                
                <?php $ip=Request::url();  $words = preg_replace('/[0-9]+/', '', $ip); ?>


                <li><a @if(Request::url() === 'http://localhost:8000/admin/theater') class="selected" @elseif(Request::url() === 'http://localhost:8000/admin/addtheater')  class="selected" @elseif($words== 'http://localhost:/admin/screens/') class="selected" @elseif($words== 'http://localhost:/admin/addscreens/') class="selected" @elseif($words== 'http://localhost:/admin/seatdistribution/') class="selected" @elseif($words== 'http://localhost:/admin/addseatcategory/') class="selected" @elseif($words== 'http://localhost:/admin/seat/') class="selected" @elseif($words== 'http://localhost:/admin/addseat/') class="selected" @elseif($words== 'http://localhost:/admin/show/') class="selected" @elseif($words== 'http://localhost:/admin/addshow/') class="selected" @else   class="csc" @endif href="/admin/theater"><i class="fa fa-television"></i> Theater </a> </li>
				

                <li><a @if(Request::url() === 'http://localhost:8000/admin/book') class="selected" @endif href="/admin/book"> <i class="fa fa-ticket" aria-hidden="true"></i> Book @if($status>0) <span class="bookstatus" style="float: right; background:  #6FB3E0; padding: 1px 10px;  font-weight: 700; color: white; border-radius: 10%;">{{ $status }}</span> @endif</a></li>
				<li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>	
			</ul>
		</div>
		<div class="content" id="content">
			<div class="nav">
				<a href="">
					<img  id="menu" class="icon icons8-Menu-Filled" width="50" height="50" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAArklEQVRoQ+2YUQ7AIAhD9ea7uYtXoJSY5u2fKn01kO0V8u2QPhaNvEYSIhAxOXCj9Zm0R2VvI2f0RNNhNGIytiwbRSTmsZdxvlTIZH+Jxr0LRCBicoBomYwty0YRiZnsrPHlQBsKo7bfmGjFPHZDYuclo+bIvH2GEyFiMFWShIhkn6EYIgZTJUn+xkv2GYrZfg2mSpJRRFjjpSw0FzMQmw2V5SAiW9gsAJFmQ2W5H0iEDyePg9qEAAAAAElFTkSuQmCC" style="width: 50px; height: 50px; padding: 10px;" >
				</a>
				<div class="navright">
					<div class="navright-left">
                       
                       
                    </div>

					<div class="navright-right">		
						<ul>
							<li class="dropdown profile_details_drop">


								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									   

                                    <div class="profile_img">	
										<span class="prfil-img"><img src="/img/mahbub.jpg"  height="40px" width="40px" alt=""> </span> 
										<div class="user-name">
											<p>Mahbub</p>
											<span>Administrator</span>
										</div>
									</div>	
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="maincontent">

				 @yield('content')
					
			</div>


		</div>
	</div>

<script type="text/javascript">


	$("#menu").click(function(e){

		 e.preventDefault();
		
			$('.sidebar').toggle('slide', { direction: 'left' }, 500);
        $('.content').animate({
            'margin-left' : $('.content').css('margin-left') == '0px' ? '250px' : '0px'
        }, 500);



	});


	




</script>




</body>
