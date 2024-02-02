<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{asset('admin/uploads')}}/{{$global_d['fav_icon']}}">
   
    <title>{{$global_d['site_title'] ?? ''}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/css/bootstrap-reset.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{asset('/admin/css/owl.carousel.css')}}" type="text/css">
    <link href="{{asset('/admin/css/slidebars.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/assets/toastr-master/toastr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/css/style-responsive.css')}}" rel="stylesheet" />
    @yield('css')

  </head>
  <body class="light-sidebar-nav">
  <section id="container">

    <?php 
     $permissions = explode(',',Auth::user()->permissions);
     
  
    ?>

      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <i class="fa fa-bars"></i>
              </div>
            <a href="{{URL::to('admin/dashboard')}}" class="logo">Get Final<span> Choice</span></a>
            <div class="top-nav ">
                <ul class="nav pull-right top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="img/avatar1_small.jpg">
                            <span class="username">{{Auth::user()->name}}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout dropdown-menu-right">
                            <div class="log-arrow-up"></div>
                            <li><a href="{{URL::to('admin/changepassword')}}"><i class="fa fa-cog"></i> Change Dashboard Login Credentials</a></li>
                            <li><a href="{{URL::to('admin/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
      <!--header end-->

      
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">

                @if(in_array('dashboard_management',$permissions))
                  <li>
                      <a class="@if(request()->segment(2) == 'dashboard') active @endif" href="{{URL::to('admin/dashboard')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  @endif
                
                  @if(in_array('user_rights_management',$permissions))
                  <li class="sub-menu">
                    <a class="@if(request()->segment(2) == 'users') active @endif" href="javascript:;" >
                        <i class="fa fa-users"></i>
                        <span>Users </span>
                    </a>
                    <ul class="sub">
                      <li><a  href="{{URL::to('admin/users/create')}}">Add New User</a></li>
                      <li><a  href="{{URL::to('admin/users/index')}}">Users List</a></li>
                    </ul>
                 </li>
                 @endif

                 @if(in_array('store_category_management',$permissions))
                 <li class="sub-menu">
                    <a class="@if(request()->segment(2) == 'storecategories') active @endif" href="javascript:;" >
                        <i class="fa fa-table"></i>
                        <span>StoreCategory </span>
                    </a>
                    <ul class="sub">
                      <li><a  href="{{URL::to('admin/storecategories/create')}}">Add New StoreCategory</a></li>
                      <li><a  href="{{URL::to('admin/storecategories/index')}}">StoreCategory List</a></li>
                    </ul>
                 </li>
                 @endif

                 @if(in_array('store_management',$permissions))
                 <li class="sub-menu">
                    <a class="@if(request()->segment(2) == 'stores') active @endif" href="javascript:;" >
                        <i class="fa fa-shopping-cart"></i>
                        <span>Store </span>
                    </a>
                    <ul class="sub" >
                      <li><a  href="{{URL::to('admin/stores/create')}}">Add New Store</a></li>
                      <li><a  href="{{URL::to('admin/stores/index')}}">Stores List</a></li>
                    </ul>
                 </li>
                 @endif
                 
                 @if(in_array('coupons_management',$permissions))
                  <li class="sub-menu">
                      <a class="@if(request()->segment(2) == 'coupons') active @endif" href="javascript:;" >
                          <i class="fa fa-bullseye"></i>
                          <span>Coupons</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{URL::to('admin/coupons/create')}}">Add Coupons</a></li>
                          <li><a  href="{{URL::to('admin/coupons/index')}}">View All Coupons</a></li>
                          <li><a  href="{{URL::to('admin/coupons/sort')}}">Sort Coupons</a></li>
                      </ul>
                  </li>
                  @endif

                  @if(in_array('blogs_category_management',$permissions))
                  <li class="sub-menu">
                    <a class="@if(request()->segment(2) == 'blogcategories') active @endif" href="javascript:;" >
                        <i class="fa fa-stack-exchange"></i>
                        <span>BlogCategory</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="{{URL::to('admin/blogcategories/create')}}">Add Category</a></li>
                        <li><a  href="{{URL::to('admin/blogcategories/index')}}">View All Category</a></li>
                    </ul>
                 </li>
                 @endif

                 @if(in_array('blogs_management',$permissions))
                 <li class="sub-menu">
                    <a class="@if(request()->segment(2) == 'blogs') active @endif" href="javascript:;" >
                      <i class="fa fa-book"></i>

                        <span>Blogs</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="{{URL::to('admin/blogs/create')}}">Add Blog</a></li>
                        <li><a  href="{{URL::to('admin/blogs/index')}}">View All Blogs</a></li>
                    </ul>
                 </li>
                 @endif


                 @if(in_array('blogs_management',$permissions))
                 <li class="sub-menu">
                    <a class="@if(request()->segment(2) == 'settings') active @endif" href="javascript:;" >
                      <i class="fa fa-cog"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="sub">
                      @foreach (explode(',',$global_d['grouping']) as $item)
                      <li><a href="{{URL::to('admin/settings/edit')}}?group={{$item}}">
                        {{ ucwords(str_ireplace("_", " ",$item))}}</a></li>  
                      @endforeach
                    </ul>
                 </li>
                 @endif
         
              </ul>
          </div>
      </aside>
      <!--sidebar end-->
      


      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

            @yield('content')

            

             

          </section>
      </section>
      <footer class="site-footer">
        <div class="text-center">
          {!!$global_d['footer_credits'] ?? ''!!}
      
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('/admin/js/jquery.js')}}"></script>
    <script src="{{asset('/admin/js/bootstrap.bundle.min.js')}}"></script>
    <script class="include" type="text/javascript" 
    src="{{asset('/admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('/admin/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('/admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('/admin/js/jquery.sparkline.js')}}" type="text/javascript"></script>
    <script src="{{asset('/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{asset('/admin/assets/toastr-master/toastr.js')}}"></script>
    <script src="{{asset('/admin/js/owl.carousel.js')}}" ></script>
    <script src="{{asset('/admin/js/jquery.customSelect.min.js')}}" ></script>
    <script src="{{asset('/admin/js/respond.min.js')}}" ></script>
    <script src="{{asset('/admin/js/slidebars.min.js')}}"></script>
    <script src="{{asset('/admin/js/common-scripts.js')}}"></script>
    <script src="{{asset('/admin/js/sparkline-chart.js')}}"></script>
    <script src="{{asset('/admin/js/easy-pie-chart.js')}}"></script>
    {{-- <script src="{{asset('/admin/js/count.js')}}"></script> --}}

  
    

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box



      $(function(){
          $('select.styled').customSelect();
         
      });
      $(window).on("resize",function(){
          var owl = $("#owl-demo").data("owlCarousel");
          owl.reinit();
      });

  </script>


    @if(Session::get('success'))
    <script> 
      toastr.success("{{Session::get('success')}}");
    </script>
    @endif

    @if(Session::get('error'))
    <script> 
      toastr.error("{{Session::get('error')}}");
    </script>
    @endif

    @if(Session::get('warning'))
    <script> 
      toastr.warning("{{Session::get('warning')}}");
    </script>
    @endif

  @yield('js')
  </body>
</html>