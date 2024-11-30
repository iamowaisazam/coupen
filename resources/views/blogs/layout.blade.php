<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('metatags')
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    
    <link rel="stylesheet" type="text/css" href="{{asset('web/css/master.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('web/css/color/color-1.css')}}" id="color" />
    <link rel="shortcut icon" href="{{asset('/admin/uploads/'.$global_d['fav_icon'] ?? '')}}">

    @yield('css')

    <style>
        #section_title_1{
          text-align: center;
          padding-top: 47px;
          padding-bottom: 35px;
        }

        

        #section_title_1 .line{
          width: 200px;
          margin: auto;
        }

        #section_title_1 .line > div{
          margin-left: auto;
          margin-right: auto;
        }
    </style>

</head>
<body>

<!--===== HEADER =====-->
<header id="main_header">

  <div id="header-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-2 hidden-xs hidden-sm"><a href="{{URL::to('/')}}">
          <img src="{{asset('/admin/uploads/'.$global_d['logo'] ?? '')}}" alt="logo"></a></div>
        <div class="col-md-10 col-sm-12 col-xs-12">
        </div>
      </div>
    </div>
  </div>
  
  <!--===== NAV-BAR =====-->
  <nav class="navbar navbar-default navbar-sticky bootsnav">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="fa fa-bars"></i></button>
          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
                @foreach ($blogs_category as $key => $item)
                <?php 
                 $active = (request()->is('blogs/categories/'.$item->slug)) ? 'active' : '';
                ?>
                <li class="{{$active}}">
                    <a href="{{URL::to('blogs/categories')}}/{{$item->slug}}" data-toggle="">{{$item->title}}</a>
                </li>
                @endforeach
                <li class="@if(request()->is('blogs')) active @endif">
                  <a href="{{URL::to('blogs')}}" data-toggle="">All</a>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
   
    @yield('content')
        

    <!-- FOOTER -->
    <footer id="footer" class="footer divider layer-overlay overlay-dark-8">
        <div class="container pt-70 pb-40">
                <div class="row border-bottom">
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <p>{{$global_d['address'] ?? ''}}</p>
                        <ul class="list-inline mt-5">
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-color-2 mr-5"></i> <a class="text-gray" href="#.">{{$global_d['phone_number'] ?? ''}}</a> </li>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-color-2 mr-5"></i> <a class="text-gray" href="#.">{{$global_d['email_address'] ?? ''}}</a> </li>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-color-2 mr-5"></i> <a class="text-gray" href="#.">{{$global_d['domain'] ?? ''}}</a> </li>
                        </ul>
                </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h4 class="widget-title">Quick Links</h4>
                        <div class="small-title">
                        <div class="line1 background-color-white"></div>
                        <div class="line2 background-color-white"></div>
                        <div class="clearfix"></div>
                        </div>
                        <ul class="list angle-double-right list-border">
                        <li> <a href="{{URL::to('/')}}">Home </a></li>
                        <li> <a href="{{URL::to('/about')}}">About </a></li>
                        <li> <a href="{{URL::to('/privacy-policy')}}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h4 class="widget-title ">Use Full Links</h4>
                        <div class="small-title">
                        <div class="line1 background-color-white"></div>
                        <div class="line2 background-color-white"></div>
                        <div class="clearfix"></div>
                        </div>
                        <ul class="list list-border">
                        <li><a href="{{URL::to('/promotions')}}">Promotions</a></li>
                        <li><a href="{{URL::to('/terms-condition')}}">Terms &amp; conditions</a></li>
                        <li><a href="{{URL::to('/contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="widget dark">
                        <h5 class="widget-title mb-10">Connect With Us</h5>
                        <ul class="socials">
                        @if($global_d['facebook_link'])
                        <li><a target="_blank" href="{{$global_d['facebook_link']}}"><i class="fa fa-facebook"></i></a></li>
                        @endif

                        @if($global_d['youtube_link'])
                        {{-- <li><a target="_blank" href="{{$global_d['youtube_link']}}"><i class="fa fa-twitter"></i></a></li> --}}
                        @endif
                         
                        @if($global_d['twitter_link'])
                        {{-- <li><a target="_blank" href="{{$global_d['twitter_link']}}"><i class="fa fa-youtube"></i></a></li> --}}
                        @endif
                      

                        @if($global_d['instagram_link'])
                        <li><a target="_blank" href="{{$global_d['instagram_link']}}"><i class="fa fa-instagram"></i></a></li>
                        @endif
                      
                      
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom bg-black-333">
        <div class="container">
            <div class="row">
            <div class="col-md-12 col-sm-5">
                <p class="font-11 text-black-777 m-0 copy-right">{!!$global_d['footer_credits']!!}
                </p>
            </div>
            </div>
        </div>
        </div>
    </footer>
  <!-- FOOTER --> 
  

        <!--===== REQUIRED JS =====--> 
        <script src="{{asset('web/js/jquery-3.2.1.min.js')}}"></script> 
        <script src="{{asset('web/js/bootstrap.min.js')}}"></script> 
        <script src="{{asset('web/js/bootsnav.js')}}"></script>
        
        <!--To View on scroll-->
        <script src="{{asset('web/js/jquery.appear.js')}}"></script>
        
        <!--Owl Slider-->
        <script src="{{asset('web/js/owl.carousel.min.js')}}"></script>
        
        <!--Parallax-->
        <script src="{{asset('web/js/parallaxie.js')}}"></script>
        
        <!--Fancybox-->
        <script src="{{asset('web/js/jquery.fancybox.min.js')}}"></script> 
        
        <!--Cube Gallery-->
        <script src="{{asset('web/js/cubeportfolio.min.js')}}"></script> 
        
        <!--Bootstrap Dropdown-->
        <script src="{{asset('web/js/bootstrap-select.js')}}"></script>
        
        <!--Video Popup-->
        <script src="{{asset('web/js/videobox/video.js')}}"></script>
        
        <!--Datepicker-->
        <script src="{{asset('web/js/datepicker.js')}}"></script> 
        
        <!--Dropzone-->
        <script src="{{asset('web/js/dropzone.min.js')}}"></script>
        
        <!--Wow animation-->
        <script src="{{asset('web/js/wow.min.js')}}"></script>
        
        <!--Rang Slider-->
        <script src="{{asset('web/js/range-Slider.min.js')}}"></script> 
        
        <!--Checkbox-->
        <script src="{{asset('web/js/selectbox-0.2.min.js')}}"></script> 
        
        <!--Checkbox-->
        <script src="{{asset('web/js/scrollreveal.min.js')}}"></script> 
        
        <!--Checkbox-->
        <script src="{{asset('web/js/jquery-countTo.js')}}"></script> 
        
        <!--Checkbox-->
        <script src="{{asset('web/js/jquery.typewriter.js')}}"></script> 
  
        <!--Checkbox-->
        <script src="{{asset('web/js/death.min.js')}}"></script>
        
        <!--Revolution Slider-->
        <script src="{{asset('web/js/themepunch/jquery.themepunch.tools.min.js')}}"></script>
        <script src="{{asset('web/js/themepunch/jquery.themepunch.revolution.min.js')}}"></script>   
        <script src="{{asset('web/js/themepunch/revolution.extension.layeranimation.min.js')}}"></script> 
        <script src="{{asset('web/js/themepunch/revolution.extension.navigation.min.js')}}"></script> 
        <script src="{{asset('web/js/themepunch/revolution.extension.parallax.min.js')}}"></script> 
        <script src="{{asset('web/js/themepunch/revolution.extension.slideanims.min.js')}}"></script> 
        <script src="{{asset('web/js/themepunch/revolution.extension.video.min.js')}}"></script>
        
        <!--Custom Js -->
        <!-- <script src="js/functions.js"></script> -->
  
        <!--Maps & Markers-->
        <script src="{{asset('web/js/form.js')}}"></script> 
        <script src="{{asset('web/js/custom-map.js')}}"></script> 
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAOBKD6V47-g_3opmidcmFapb3kSNAR70U"></script>
        <script src="{{asset('web/js/gmaps.js')}}"></script>
        <script src="{{asset('web/js/contact.js')}}"></script> 
        <!--===== #/REQUIRED JS =====-->
    
        @yield('js')
   </body>
  </html>