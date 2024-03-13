<header>
<nav id='cssmenu' >
<div class="logo">
<span style="color: white; font-weight: 700;font-size: 25px;">Housefull<span  style="font-size: 25px;color: orange; font-weight: 700" class="logos">BD</span></span>
</div>
<div id="head-mobile"></div>
<div class="button"></div>
<ul>
<li><a href='\'>Home</a></li>
<li><a href='#'>Movie</a>
   <ul>
          

       <div class="csdvsd">
        

        <div class="container" id="mood">
        
  <?php
    $t =Carbon\Carbon::now()->format('Ymd');
  ?>


       <section class="cols" style="margin-left: 50px;">

        <h4>Bangla</h4><hr>
        @foreach($movies as $data)

         @if($data->country=="Bangladesh")
          <h5><a href="/view/{{ $data->name }}/{{ $data->id }}/{{$t}}">{{$data->name}}</a></h5>
        @endif
         @endforeach
         
    
        </section>



       <section class="cols">

        <h4>Indo-Bangla</h4><hr>
        @foreach($movies as $data)

         @if($data->country=="Indo-Bangladesh")
          <h5><a href="/view/{{ $data->name }}/{{ $data->id }}/{{$t}}">{{$data->name}}</a></h5>
        @endif
         @endforeach
         
    
        </section>





       <section class="cols">

        <h4>English</h4><hr>
        @foreach($movies as $data)

         @if($data->country=="American")
          <h5><a href="/view/{{ $data->name }}/{{ $data->id }}/{{$t}}">{{$data->name}}</a></h5>
        @endif
         @endforeach
         
    
        </section>


        


       



          
        </div>
      

      </div>

   </ul>
</li>
<li><a href='#'>Theater</a>

 <ul>
      

       <div class="csdvsdc">
        

        <div class="container" id="mood">

       
            <section class="cols">

         <?php
      use Carbon\Carbon;  
    $t = Carbon::now()->format('Ymd');
  ?>
  

        <h4>Dhaka</h4><hr>
        @foreach($theaters as $data)

         @if($data->city=="Dhaka")
          <h5><a href="/Theater/{{$data->hname}}/{{$t}}">{{$data->hname}}</a></h5>
        @endif
         @endforeach
         
    
        </section>



       <section class="cols">

        <h4>Sylhet</h4><hr>
        @foreach($theaters as $data)

         @if($data->city=="Sylhet")
          <h5><a href="/Theater/{{$data->hname}}/{{$t}}">{{$data->hname}}</a></h5>
        @endif
         @endforeach
         
    
        </section>



       <section class="cols">

        <h4>Chittagong</h4><hr>
        @foreach($theaters as $data)

         @if($data->city=="Chittagong")
          <h5><a href="/Theater/{{$data->hname}}/{{$t}}">{{$data->hname}}</a></h5>
        @endif
         @endforeach
         
    
        </section>





       <section class="cols">

        <h4>Khulna</h4><hr>
        @foreach($theaters as $data)

         @if($data->city=="Khulna")
          <h5><a href="/Theater/{{ $data->hname }}/{{$t}}">{{$data->hname}}</a></h5>
        @endif
         @endforeach
         
    
        </section>


        
        

       <section class="cols">

        <h4>Rajshahi</h4><hr>
        @foreach($theaters as $data)

         @if($data->city=="Rajshahi")
          <h5><a href="/Theater/{{ $data->hname }}/{{$t}}">{{$data->hname}}</a></h5>
        @endif
         @endforeach
         
    
        </section>

   

       



          
          
        </div>
      

      </div>

   </ul>
















</li>

<li><a href="\contactus">Contact Us</a></li>









  @if(Auth::user())


<li><a href='/users/{{Auth::user()->id}}/profile/'>User</a></li>

@else

<li><a href='/login'>Login/Signup</a></li>

  @endif

</ul>
</nav>
</header>




<!---

<script src="/jquery.min.jss"></script>

<script type="text/javascript">
   
   (function($) {
$.fn.menumaker = function(options) {  
 var cssmenu = $(this), settings = $.extend({
   format: "dropdown",
   sticky: false
 }, options);
 return this.each(function() {





   $(this).find(".button").on('click', function(){
     $(this).toggleClass('menu-opened');
     var mainmenu = $(this).next('ul');
     if (mainmenu.hasClass('open')) { 
       mainmenu.slideToggle().removeClass('open');
     }
     else {
       mainmenu.slideToggle().addClass('open');
       if (settings.format === "dropdown") {
         mainmenu.find('ul').show();
       }
     }
   });





   cssmenu.find('li ul').parent().addClass('has-sub');


multiTg = function() {
     cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
     cssmenu.find('.submenu-button').on('click', function() {
       $(this).toggleClass('submenu-opened');
       if ($(this).siblings('ul').hasClass('open')) {
         $(this).siblings('ul').removeClass('open').slideToggle();
       }
       else {
         $(this).siblings('ul').addClass('open').slideToggle();
       }
     });
   };





   if (settings.format === 'multitoggle') multiTg();
   else cssmenu.addClass('dropdown');
   if (settings.sticky === true) cssmenu.css('position', 'fixed');
resizeFix = function() {
  var mediasize = 1000;
     if ($( window ).width() > mediasize) {
       cssmenu.find('ul').show();
     }
     if ($(window).width() <= mediasize) {
       cssmenu.find('ul').hide().removeClass('open');
     }
   };
   resizeFix();
   return $(window).on('resize', resizeFix);



 });
  };
})(jQuery);










(function($){
$(document).ready(function(){
$("#cssmenu").menumaker({
   format: "multitoggle"
});
});
})(jQuery);



</script> 


---!>
