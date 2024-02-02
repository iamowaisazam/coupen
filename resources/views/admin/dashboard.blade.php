@extends('admin.layout')

@section('css')
    
@endsection

@section('content')
      <!--state overview start-->
      <div class="row state-overview">
        <div class="col-lg-6 col-sm-6">
            <section class="cards">
                <div class="symbol terques">
                    <i class="fa fa-user"></i>
                </div>
                <div class="value">
                    <h1 class="count">
                        {{$stores}}
                    </h1>
                    <p class="mid-font">Total Number Of Stores</p>
                </div>
            </section>
        </div>
        <div class="col-lg-6 col-sm-6">
            <section class="cards">
                <div class="symbol red">
                    <i class="fa fa-tags"></i>
                </div>
                <div class="value">
                    <h1 class=" count2">
                        {{$coupons}}
                    </h1>
                    <p class="mid-font">TOTAL NUMBER OF COUPONS</p>
                </div>
            </section>
        </div>
        <div class="col-lg-6 col-sm-6">
            <section class="cards">
                <div class="symbol yellow">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="value">
                    <h1 class=" count3">
                        {{$blogs}}
                    </h1>
                    <p class="mid-font">TOTAL NUMBER OF BLOG</p>
                </div>
            </section>
        </div>
        <div class="col-lg-6 col-sm-6">
            <section class="cards">
                <div class="symbol blue">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="value">
                    <h1 class=" count4">
                        {{$storeCategory}}
                    </h1>
                    <p class="mid-font">TOTAL STORE CATEGORIES</p>
                </div>
            </section>
        </div>
    </div>
    <!--state overview end-->
@endsection


@section('js')
    
@endsection