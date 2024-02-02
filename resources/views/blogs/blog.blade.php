@extends('blogs.layout')

@php
    $bg = asset('admin/uploads/'.$blog->banner);   
@endphp

@section('metatags')
  <title>{{$blog->title}}</title>
  <meta name="description" content="{{$blog->meta_description}}">
  <meta name="keywords" content="{{$blog->meta_keywords}}">
@endsection



@section('css')
  <style>
      #banner-nin {
            background: url("{{$bg}}")!important;
        }

        .blog_image{
          width: 600px;
      }

      .content{
        padding-top: 19px!important;

      }
  </style>
@endsection

@section('content')
 
<!-- Banner -->
<section id="banner-nin" class="parallaxie">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="banner_detail">
          <h2>{{$blog->banner_alt}}</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /#Banner --> 


<section id="news-section-1" class="news-section-details property-details padding_top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 bottom40" style="margin-top: 40px;">
        <h2 class="text-uppercase">{{$blog->title}}</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <div class="line_3"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="news-1-box margin_bottom  clearfix">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <img  src="{{asset('/admin/uploads/'.$blog->image)}}" alt="{{$blog->alt}}" class="blog_image img-responsive">
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">  
              <div class="content pt-5">
                {!!$blog->long_des!!}
              </div>
         
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@section('js')

@endsection