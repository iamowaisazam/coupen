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
<style>

    #banner-nin {
      background: url("{{$bg}}")!important;
    }

    .owais{

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
          <h2>{!!$global_d['blog_banner_title']!!}</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /#Banner --> 


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
