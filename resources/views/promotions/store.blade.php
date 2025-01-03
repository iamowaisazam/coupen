@extends('promotions.layout')
@php
    $azArray = array();
  for ($i = 97; $i <= 122; $i++) {
      $azArray[chr($i)] = "Value " . chr($i);
  }

  // dd($sessionId = session()->getId());

  $arrays = Session::get('views') ? Session::get('views') : [];
  $views = $data->views;

  


  // dd($arrays);
  // Session::put('views', 'value');

  if(!in_array($data->id,$arrays)){

      array_push($arrays,$data->id);
      Session::put('views',$arrays);


     
      $views = $views + 1;
     \App\Models\Store::where('id',$data->id)->update(['views' =>  $views]);
    
  }

  

  
@endphp

@section('metatags')
  <title>{{$data->meta_title}}</title>
  <meta name="description" content="{{$data->meta_description}}">
  <meta name="keywords" content="{{$data->meta_keywords}}">
@endsection

@section('css')
  <style>
.image_popup {
    /* height: 10%; */
    /* width: 65%; */
    max-width: 300px;
    height: 300px;
    padding-bottom:20px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /
    border-radius: 8px;
    transition: transform 0.3s ease; 
}

.image_popup {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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


      /* .coupon_box .image{
        width: 300px;
        height: 200px;
      } */

      .property_item{
        display: flex;
      }

      .proerty_content{
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* padding: 19px; */
      }

      .proerty_text{
        height: 100%;
      }

      .visit_store{
        width: 133px!important;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 10px;
      }

      @media (max-width: 767px) {

        .coupon_box .image{
          width: 100%;
          /* height: 200px; */
        }
      
        .property_item {
            display: flex;
            flex-direction: column;
            justify-content: center!important;
            align-items: center;
            max-width: 300px;
            margin: auto;
            margin-bottom: 20px;
        }


      }

      .store_coupon{
        padding: 0px 30px;
      }

      @media (min-width: 990px) {
        .store_coupon .card-flex {
              justify-content: center;
              gap: 5.5rem !important;
          }
      }
      .store_coupon .card-image {
          display: flex;
          justify-content: center;
          align-items: center;
      }
      .store_coupon .card-text {
          flex-direction: column !important;
          display: flex;
          justify-content: center !important;
          max-width: 350px;
          width: 100%;
      }
      
      .store_coupon .coup_btn {
          color: rgba(33, 37, 41);
          text-decoration: none;
          width: 100%;
          position: relative;
      }
      .store_coupon .coupon_custom_btn {
          display: block;
          position: relative;
          text-align: center;
      }
      .store_coupon .coupon_custom_btn>div {
          border: #000 2px dashed;
          height: 45px;
      }
     .store_coupon .coupon-div-btn {
          text-transform: uppercase;
          text-align: right !important;
          font-weight: 700 !important;
          font-size: 13px !important;
          padding-right: 0.5rem !important;
          padding-left: 0.5rem !important;
          width: 100% !important;
      }
      .store_coupon .coupons_custom_btn {
          height: 45px;
          width: 100% !important;
          right: 0 !important;
          top: 0 !important;
          position: absolute !important;
          display: block !important;
          overflow: hidden !important;
      }
    .store_coupon .position-absolute {
          position: absolute;
          top: 0 !important;
          overflow: hidden !important;
      }
    .store_coupon  .coupons_custom_btn>div {
          left: -7px;
          height: 45px;
          width: 97%;
          transition: width .3s ease-in-out;
      }
    .store_coupon  .coupons_custom_btn>div>button {
          width: 95%;
          transform: skew(-20deg, 0deg);
          transition: background-color .3s;
      }
    .store_coupon  .card-btn {
          background: linear-gradient(45deg, black, #d52984);
          color: rgba(255, 255, 255);
          text-transform: uppercase !important;
          text-align: center !important;
          font-weight: 700 !important;
          padding-left: 1rem !important;
          padding: 0.25rem !important;
          align-items: center !important;
          justify-content: center !important;
          height: 100% !important;
          border: 0 !important;
          display: flex !important;
      }
    .store_coupon  .coupons_custom_btn>div>button>span {
          transform: skew(20deg, 0deg);
      }
    .store_coupon  .coupons_custom_btn>div:hover {
          width: 70%;
      }

  </style>
@endsection
@section('content')
<section class="my_pro padding bg-color-gray">
    <div class="container">
      <div class="row property-list-list">
          <div class="col-xs-12 col-sm-3 col-md-3 property-list-list-image">
              <img src="{{asset('/admin/uploads/'.$data->image)}}" alt="recent-properties-1" class="img-responsive">
              <a href="{{$data->direct_url}}" target="_blank" >
                <div class=" visit_store property_meta margin-t-2 bg-black bottom40" style="width: 40%;">
                  <span><i class="fa fa-arrow-right"></i>VISIT STORE</span>
                </div>
              </a>
          </div>
          <div class="col-xs-12 col-sm-8 col-md-8 property-list-list-info">
                <div style="padding-bottom: 10px" class="col-xs-12 col-sm-12 col-md-12">
                  <a href="{{URL::to('/promotions/stores/')}}/{{$data->slug}}">
                    <h3>{{$data->title}} ({{ ucwords(str_ireplace("_", " ",$data->heading))}})</h3>  
                  </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <p> <span style="font-weight: 600;" >Date:</span>  <span >{{ date('d F Y', strtotime($data->created_at)) }}</span> </p>
                  <p> <span style="font-weight: 600;"  >Views:</span> <span>{{$views}}</span> </p>
                  <p style="padding-bottom: 5px" >{{$data->short_des}}</p>
                 
              
                </div>
          </div>
      </div>
    </div>
  </section>



  <section id="news-section-1" class="bg-color-gray coupon_box property-details padding_top">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-sm-12 col-xs-12">

              @foreach ($coupons as $coupon)
              <div class="row">
                <div class="col-sm-12">

                  <div style="background-color: #e2e3e5 !important;" class="property_item heading_space">
                        <div class="image">
                          <img style="width:100%" src="{{asset('admin/uploads/'.$data->image)}}" alt="listin" class="img-responsive">   
                        </div>
                        <div class="proerty_content" >

                          <div class="store_coupon ">
                            
                              <div style="padding: 11px 0px;">
                                  <a class="text-coupon text-dark">
                                    <p>{{$coupon->offer_name}}</p>
                                  </a>
                              </div>
                                <a class="coup_btn redirect_link favroute clearfix" data-link="{{$coupon->tracking_link}}" data-toggle="modal" data-target="#myModal{{$coupon->id}}" data-code="{{ $coupon->code }}" >
                                <div class="coupon_custom_btn" id="s129091">
                                    <div class="coupon-div-btn">
                                       <p></p>
                                      </div>
                                </div>
                                <div class="coupons_custom_btn small">
                                  <div class="position-absolute">
                                    <button class="card-btn small">
                                      <span class="fw-bold my-auto">
                                        @if($coupon->type == 'code')
                                          Copy Code &amp; visit Store
                                        @else
                                          Get Offer
                                        @endif
                                      </span>
                                    </button>
                                  </div>
                                </div>
                              </a>
                              @if($coupon->expiry)
                              <p style="padding: 11px 0px;" class="card-coupon-p small">expires: 
                                {{ date("d-m-Y", strtotime($coupon->expiry))}}</p>
                              @endif
                          
                          </div>    
                        </div>
                  </div>


                  @component('promotions.components.coupen',['data' => $coupon,'mainData'=> $data]) @endcomponent
                </div>
              </div>
              @endforeach   
           

       
        </div>


        <div style="background: white;" class=" col-md-3 col-lg-3"> 
          <div style="background: white;" class="blog_info blog-thumbnail">
            <div class="blogimagedescription">
              <h3>Related Store </h3>
            </div>
            <ul class="archieves clearfix">
              @foreach ($related as $r_store)
              <li><a href="{{URL::to('/promotions/stores/')}}/{{$r_store->slug}}">{{$r_store->title}}</a></li>
              @endforeach
              
            </ul>
          </div>      
        </div>
      </div>
    </div>
  </section>
 





@endsection



@section('js')

<script>
  $('.redirect_link').click(function(){
    var code = event.currentTarget.dataset.code;
    navigator.clipboard.writeText(code)
            .then((r) => {
                // console.log(r)
            })
            .catch(err => {
                console.error('Unable to copy text to clipboard', err);
     });

     var link = $(this).data("link");
      window.open(link, '_blank');


  });


  document.addEventListener('DOMContentLoaded', function () {

            $(".clipboard .copyButton").click(function(){
            
                var copyButton = $(this);
                var codeText = copyButton.parent().find('.code');
                navigator.clipboard.writeText(codeText.text())
                    .then(() => {
                        copyButton.text('Code Copied!');
                        setTimeout(function () {
                          copyButton.text('Click Here To Copy Code');
                        }, 2000);
                    })
                    .catch(err => {
                        console.error('Unable to copy text to clipboard', err);
                    });
            });

  });
</script>

@endsection