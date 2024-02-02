@extends('blogs.layout')

@php
$bg = asset('admin/uploads/'.$global_d['blog_banner']);    
@endphp

@section('metatags')
    <title>Privacy Policy</title>
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


<section id="our-mission" class="padding">
    <div class="container">
        <div class="content">
            {!!$global_d['privacy_policy']!!}
        </div>
      </div>
  </section>
@endsection
