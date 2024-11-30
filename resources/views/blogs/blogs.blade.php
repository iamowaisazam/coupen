@extends('blogs.layout')

<?php $bg = asset('admin/uploads/'.$global_d['blog_banner']); ?>


@section('metatags')
  <title>{{$global_d['blog_meta_title'] ?? ''}}</title>
  <meta name="description" content="{{$global_d['blog_meta_description'] ?? ''}}">
  <meta name="keywords" content="{{$global_d['blog_keywords'] ?? ''}}">
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

      .news-section-details img{
          width: 100%;
      }

      .paginate{
          padding-bottom: 50px;
      }

      .pager li>span {
          border-radius: 0px!important;
      }

      .active span {
          background: red!important;
          color: white!important;
      }

      .latest_page_box {
          border: 1px solid #e3e3e3;
          border-radius: 5px;
          margin-bottom: 50px;
      }

      #news-section-1{
          padding-top: 30px;
      }

      .main-content{
        background: #edf3f8;
        padding-top: 24px;
      }

</style>
@endsection

@section('content')

<div class="">


 
<!-- Banner -->
<section id="banner-nin" class="parallaxie">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="banner_detail">
          <h2>Well Come in <span>{{$global_d['site_title'] ?? ''}}</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /#Banner --> 



<section style="background:white;" id="news-section-1" class="
news-section-details property-details padding_top">
  <div class="container">

            <div class="row">
                @foreach ($blogs as $index => $item)
                <div class="col-md-4">
                    <div class="latest_page_box">
                        <div class="news_image">
                            <img src="{{asset('/admin/uploads/'.$item->image)}}" />
                            <div class="price">
                                <span class="tag_red">{{$item->cat_title}}</span>
                            </div>
                        </div>
                        <div class="news_padding">
                            <h3>{{$item->title}}</h3>
                            <p> {{substr($item->short_des, 0,50)}}..</p> <br>
                            <a class="d-block btn_fill" href="{{URL::to('/blogs/'.$item->slug)}}">Read More</a>
                        </div>
                    </div>
                </div>
                @if (($index + 1) % 3 == 0)
                  <div class="clearfix"></div>
                @endif
                @endforeach
                <div class="col-md-12">
                    <div class="paginate text-center">
                        {{ $blogs->links('pagination.custom') }}
                    </div>
                </div>
            </div>
  </div>
</section>


</div>



@endsection
@section('js')

@endsection