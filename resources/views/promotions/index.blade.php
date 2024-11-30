@extends('promotions.layout')

<?php 
    $bg = asset('admin/uploads/'.$global_d['store_banner']);
?>


@section('metatags')
    <title>{{$global_d['store_meta_title'] ?? ''}}</title>
    <meta name="description" content="{{$global_d['store_meta_description'] ?? ''}}">
    <meta name="keywords" content="{{$global_d['store_keywords'] ?? ''}}">
@endsection

@section('css')

    <style>
        #banner-nin {
        background: url("{{$bg}}")!important;
        }
        .latest_page_box img{
            width: 100%;
        }

        .title{
            padding: 48px 0px;
        }

        .latest_page_box {
        border: 1px solid #e3e3e3;
        border-radius: 5px;
        margin-bottom: 50px;
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
            <h2>{!!$global_d['store_banner_title']!!}</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /#Banner --> 
 


<div class="top_section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="title text-center" >TODAY`S TOP DEALS AND COUPONS</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($data as $item)

            {{-- {{URL::to('/promotions/stores/')}}/{{$data->slug}} --}}
            <div class="col-md-4">
                <div   class="latest_page_box">
                    
                    <div class="news_image">
                        <a href="{{URL::to('/promotions/stores/')}}/{{$item->slug}}">
                        <img class="img-fluid" alt="{{$item->alt}}" src="{{asset('admin/uploads/'.$item->image)}}">
                       </a>
                    </div>
                    <div class="news_padding">
                        <h3><a href="{{URL::to('/promotions/stores/')}}/{{$item->slug}}"> {{$item->title}} </a> </h3>
                         <br>
                         {{-- <div  class="text-center">
                            <a style="cursor: pointer" data-link="{{$item->tracking_link}}" 
                            data-toggle="modal" data-target="#myModal{{$item->id}}" class="redirect_link d-block btn_fill" >View</a>
                         </div> --}}
                        
                    </div>
                </div>
                
            </div>

            @endforeach

        </div>
    </div>
   
</div>



@endsection

@section('js')

<script>
  $('.redirect_link').click(function(){

     var link = $(this).data("link");
      window.open(link, '_blank');


  });
</script>

@endsection