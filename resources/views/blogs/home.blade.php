@extends('blogs.layout')

@php
$bg = asset('admin/uploads/'.$global_d['blog_banner']);   


@endphp

@section('metatags')
    <title>{{$global_d['blog_meta_tags'] ?? ''}}</title>
    <meta name="description" content="{{$global_d['blog_meta_description'] ?? ''}}">
    <meta name="keywords" content="{{$global_d['blog_keywords'] ?? ''}}">
@endsection


@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />


<style>

    #banner-nin {
      background: url("{{$bg}}")!important;
    }


        .slider {
            /* width: 80%; */
            /* margin: 0 auto; */
        }
/* 
        .slick-slide img {
            width: 100%;
            border-radius: 10px;
        }

        .slick-prev, .slick-next {
            font-size: 30px;
            color: #333;
            z-index: 1;
        }

        .slick-prev:hover, .slick-next:hover {
            color: #007BFF;
        }

        .slick-dots li button:before {
            color: #333;
        }

        .slick-dots li.slick-active button:before {
            color: #007BFF;
        } */

        .slider-title{
            position: absolute;
            top: 130px;
            width: 100%;
            text-align: center;
            color: white;
        }

</style>
@endsection

@section('content')

<div class="slider">
    @foreach ($blogs->where('featured4',1) as $blog)
        <div style="position: relative" >
            <div style="min-height: 300px;background:url({{asset('admin/uploads/'.$blog->image)}})" > 
            </div>
            <h3 class="slider-title" >
                <a href="{{URL::to('/blogs/'.$blog->slug)}}">{{$blog->title}}</a>
            </h3>
        </div>
    @endforeach
</div>

<section id="news-section" class="padding news_3">
  <div class="container">
        <div class="row">
            <div class="col-md-12 bottom40" style="margin-top: 40px;">
                <h2 class="text-uppercase">SAVE SUM MORE</h2>
                <div class="line_1"></div>
                <div class="line_2"></div>
                <div class="line_3"></div>
            </div>
        </div>
        <div class="row">
            @foreach ($blogs->where('featured1',1) as $blog)
                <div class="col-md-4">
                    <div class="latest_page_box">
                        <div class="news_image">
                            <img src="{{asset('/admin/uploads/'.$blog->image)}}" />
                            <div class="price">
                                <span class="tag_red">{{$blog->cat_title}}</span>
                            </div>
                        </div>
                        <div class="news_padding">
                            <h3>{{$blog->title}}</h3>
                            <p>{{substr($blog->short_des, 0,50)}}..</p> <br>
                            <a class="d-block btn_fill" href="{{URL::to('/blogs/'.$blog->slug)}}">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
          <div class="col-md-12 bottom40" style="margin-top: 40px;">
              <h2 class="text-uppercase">FEATURED BLOGS</h2>
              <div class="line_1"></div>
              <div class="line_2"></div>
              <div class="line_3"></div>
          </div>
      </div>
      <div class="row">
          @foreach ($blogs->where('featured2',1) as $blog)
              <div class="col-md-4 ">
                  <div class="latest_page_box">
                      <div class="news_image">
                          <img src="{{asset('/admin/uploads/'.$blog->image)}}" />
                          <div class="price">
                              <span class="tag_red">{{$blog->cat_title}}</span>
                          </div>
                      </div>
                      <div class="news_padding">
                          <h3>{{$blog->title}}</h3>
                          <p>{{substr($blog->short_des, 0,50)}}..</p> <br>
                          <a class="d-block btn_fill" href="{{URL::to('/blogs/'.$blog->slug)}}">Read More</a>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>

      <div class="row">
        <div class="col-md-12 bottom40" style="margin-top: 40px;">
            <h2 class="text-uppercase">MOST POPULAR BLOGS</h2>
            <div class="line_1"></div>
            <div class="line_2"></div>
            <div class="line_3"></div>
        </div>
    </div>
    <div class="row">
        @foreach ($blogs->where('featured3',1) as $blog)
            <div class="col-md-4 ">
                <div class="latest_page_box">
                    <div class="news_image">
                        <img src="{{asset('/admin/uploads/'.$blog->image)}}" />
                        <div class="price">
                            <span class="tag_red">{{$blog->cat_title}}</span>
                        </div>
                    </div>
                    <div class="news_padding">
                        <h3>{{$blog->title}}</h3>
                        <p>{{substr($blog->short_des, 0,50)}}..</p> <br>
                        <a class="d-block btn_fill" href="{{URL::to('/blogs/'.$blog->slug)}}">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  

      

  </div>
</section>
@endsection


@section('js')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(document).ready(function () {
        $('.slider').slick({
                dots: true,                    // Enable dots navigation
                infinite: true,                // Infinite scrolling
                speed: 500,                    // Transition speed
                slidesToShow: 1,               // Number of slides to show
                slidesToScroll: 1,             // Number of slides to scroll
                // autoplay: true,
                autoplaySpeed: 3000,           // Autoplay interval
                // arrows: true,                  // Show prev/next arrows
                responsive: [
                    {
                        breakpoint: 768,       // For tablets and below
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 480,       // For mobile devices
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
</script>



@endsection