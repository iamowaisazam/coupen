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
    height: 10%;
    width: 65%;
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


      .coupon_box .image{
        width: 300px;
        height: 200px;
      }

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

                  <div class="property_item heading_space">
                        <div class="image">
                          <img style="width:100%" src="{{asset('admin/uploads/'.$data->image)}}" alt="listin" class="img-responsive">   
                        </div>
                        <div class="proerty_content">
                          <div class="proerty_text">
                            <h3><a>{{$coupon->offer_name}}</a></h3>
                            <span class="bottom10">Expiry Date: {{$coupon->expiry}}</span>
                          </div>
                          <div data-link="{{$coupon->tracking_link}}" data-toggle="modal" data-target="#myModal{{$coupon->id}}" data-code="{{ $coupon->code }}" class="redirect_link favroute clearfix" style="cursor: pointer;background-color: #ed2a28;">
                            @if($coupon->type == 'code')
                              <p class="pull-left" style="color:#fff; font-size: 16px; font-weight: 700;">Copy Code &amp; visit Store </p>
                            @else
                              <p class="pull-left" style="color:#fff; font-size: 16px; font-weight: 700;">Get Offer</p>
                            @endif
                        </div>
                        </div>
                  </div>


                  @component('promotions.components.coupen',['data' => $coupon,'mainData'=> $data]) @endcomponent
                </div>
              </div>
              @endforeach   
           

            <div class="col-md-12">
              <div style="padding: 30px 0px" class="paginate text-center">
                {{ $coupons->links('pagination.custom') }}
            </div>
            </div>
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