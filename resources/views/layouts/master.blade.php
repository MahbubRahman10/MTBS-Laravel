
<html>
<head>
      <title>HousefullBD</title>
      <link rel="icon" type="image/png" href="/img/film-reel.png">
      @include('sections.head')
</head>
<body>
	<div id="container">

      @include('sections/nav')
        
           
                        @yield('content')
                    
              @include('sections.footer')  
         
	</div>   
	@include('sections.scripts')

</body>      