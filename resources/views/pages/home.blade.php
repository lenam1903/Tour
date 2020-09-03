@extends('layout.index')

@section('content')

<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pt-60 pb-60 pt-sm-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Begin Slider Area -->
                <div class="slider-area">
                    <div class="slider-active owl-carousel">
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left animation-style-01 bg-1">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                                
                                <h3>Starting at <span>1200000</span></h3>
                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left animation-style-02 bg-2">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>Black Friday</span> This Week</h5>
                                <h2>Work Desk Surface Studio 2018</h2>
                                <h3>Starting at <span>824.000đ</span></h3>
                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                        <!-- Begin Single Slide Area -->
                        <div class="single-slide align-center-left animation-style-01 bg-3">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>-10% Off</span> This Week</h5>
                                <h2>Phantom 4 Pro+ Obsidian</h2>
                                <h3>Starting at <span>1849.000 đ</span></h3>
                            </div>
                        </div>
                        <!-- Single Slide Area End Here -->
                    </div>
                </div>
                <!-- Slider Area End Here -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                    <div id="list-view" class="tab-pane fade product-list-view active show" role="tabpanel">
                            <div class="row">
                                <div class="col">
                                    @foreach($tourPaginate as $t)
                                        <div class="row product-layout-list">
                                            <div class="col-lg-3 col-md-5 ">
                                                <div class="product-image">
                                                    <a href="DetailTour/{{$t->ID}}">
                                                        <img width="500px" height="200px" src="upload/tour/{{$t->Image}}" alt="{{$t->Tour_Name}}">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-7">
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a ><i class="far fa-calendar-alt"></i> {{$t->Departure_Day}} - Ngày xuất phát</a>
                                                                <a  style="padding-left:50px"><i class="fas fa-couch"></i>Số ghế: {{$t->Number_Of_Seats_Available}}</a>
                                                            </h5>
                                                        </div>
                                                        <h4><a class="product_name" href="DetailTour/{{$t->ID}}">{{$t->Tour_Name}}</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price" style="color: red;">{{number_format($t->Price)}} VNĐ</span>
                                                        </div>
                                                        <p><i class='fas fa-crosshairs'
                                                                style='font-size:26px'></i><b>{{$t->places1->Name_Places}}</b></p>
                                                        <p > {!! substr($t->Describe, 0 , 500) !!}...</p>
                                                        <div class="comment-review">
                                                            <span>Tổng Đánh Giá: {{round($t->Rate, 5)}}/5 <b> </b> <i class="fa fa-star" style="font-size:48px;color:red"></i> 
                                                            </span>   
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="shop-add-action mb-xs-30">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart"><a onclick="AddCart({{$t->ID}})" href="javascript:"> Add Cart <span class="add-cart-large"></span></a></li>
                                                        
                                                        <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i>{{$t->views}}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    @endforeach
                                   
                                </div>
                            </div>
                            {!! $tourPaginate->links() !!}
                        </div>
                       
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
            @include('layout.menu')
        </div>
    </div>
</div>

@endsection

