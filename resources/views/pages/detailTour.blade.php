@extends('layout.index')
@section('title', 'Chi Tiết Tour')

@section('content')

<!-- Page Content -->
<div class="container-fluid">
	<div id="content" class="row main-left" style="width: 132%; padding-left: 3%">
		<div class="col-md-9">
			 <!-- content-wraper start -->
            <div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                            <div style="padding-top: 20%;" class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                    <div class="lg-image">
                                        
                                            <img src="upload/tour/{{$idTour->Image}}" alt="product image">
                                        
                                    </div>
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                   
                                    <div class="product-desc">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="product-details-view-content pt-60">
                                            <div class="product-info" style="font-size: 20;">
                                                <a href="DetailTour/{{$idTour->ID}}"><h2 style="border-bottom: 1px solid">{{$idTour->Tour_Name}}</h2></a>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                                        <div class="f-left l"><i class="fas fa-barcode"> </i>Mã Tour:
                                                            <b>{{$idTour->Tour_Code}}</b></div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                                        <div class="f-left l"><i class="fas fa-couch"></i> Số chỗ còn nhận: <span
                                                                class="font500"><b>{{$idTour->Number_Of_Seats_Available}}</b></span>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                                        <div class="f-left l"><i class="far fa-calendar-alt"></i> Ngày khởi hành:
                                                            <span class="font500"><b>{{$idTour->Departure_Day}}</b></span></div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                                        <div class="f-left l"><i class='fas fa-place-of-worship'
                                                                style='font-size:26px'></i>Nơi Xuất Phát: <a href="#" target="_blank"
                                                                class="b"
                                                                style="color: black"><b>{{$idTour->Place_Of_Departure}}</b></a></div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                                        <div class="f-left l"><i class='fas fa-crosshairs'
                                                                style='font-size:26px'></i>Điểm Đến: <a href="#" target="_blank"
                                                                class="b"
                                                                style="color: black"><b>{{$idTour->places1->Name_Places}}</b></a></div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                                        <div class="f-left l"><i class="far fa-clock"></i> Số ngày:
                                                            <b>{{$idTour->Tour_Time}}</b><span class="font500"></span></div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                                                        <div class="f-left l"><i class="fa fa-eye"></i> Lượt Xem: <span
                                                                class="font500 price"><b>{{$idTour->views}} </b></span></div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                                        <div class="f-left l"><i></i> Phương Tiện:
                                                            <span class="font500">
                                                                <?php
                                                                    if(is_numeric(strpos($idTour->Transportation ,  'bicycle'))){
                                                                        echo $bicycle = str_replace( $idTour->Transportation, '<i class="fa fa-bicycle" style="font-size:24px"></i>&nbsp;', $idTour->Transportation );
                                                                    }

                                                                    if(is_numeric(strpos($idTour->Transportation ,  'planes'))){
                                                                        echo $planes = str_replace( $idTour->Transportation, '<i class="fa fa-plane" style="font-size:24px"></i>&nbsp;', $idTour->Transportation );
                                                                    }
                                                
                                                                    if(is_numeric((strpos($idTour->Transportation ,  'car')))){
                                                                        echo $car = str_replace( $idTour->Transportation, '<i class="fa fa-car" style="font-size:24px"></i>&nbsp;', $idTour->Transportation );
                                                                    }
                                                                
                                                                    if(is_numeric(strpos($idTour->Transportation ,  'motorbike'))){
                                                                        echo $motorbike = str_replace( $idTour->Transportation, '<i class="fa fa-motorcycle" style="font-size:24px"></i>&nbsp;', $idTour->Transportation );
                                                                    }
                                                                ?>
                                                            </span>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                                                        <div class="f-left l"><i class="far fa-money-bill-alt"></i> Giá: <span
                                                                class="font500 price"><b style="color: red;">{{number_format($idTour->Price)}}
                                                                    đ</b></span></div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                                </div>
                                    <div class="single-add-to-cart">
                                        <form action="#" class="cart-quantity">
                                            <button onclick="AddCart({{$idTour->ID}})"  class="add-to-cart" type="button">Add to cart</button>
                                        </form>
                                    </div>
                                    <div class="product-additional-info pt-25">
                                        <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                        <div class="product-social-sharing pt-25">
                                            <ul>
                                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                                <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="block-reassurance">
                                        <ul>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </div>
                                                    <p>Security policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-exchange"></i>
                                                    </div>
                                                    <p> Return policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            <!-- Begin Product Area -->
            <div class="product-area pt-35">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#description"><span>Mô Tả</span></a></li>
                                   <li><a data-toggle="tab" href="#reviews"><span>Đánh Giá</span></a></li>
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <span>{!! $idTour->Describe !!}</span>
                            </div>
                        </div>
                      
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="product-reviews" >
                                <div class="product-details-comment-block">
                                    <div id="ajaxReview">
                                        <div class="comment-review">
                                            <span>Tổng Đánh Giá: {{$idTour->Rate}} <b> </b> <i class="fa fa-star" style="font-size:48px;color:red"></i> 
                                            </span>   
                                        </div>
                                    
                                        @foreach($comment as $c)
                                            @if($c->ID_Tour == $idTour->ID)
                                                <div class="comment-author-infos pt-25">
                                                    
                                                    <span>{{$c->ID_Users}}</span>

                                                    <p>{{$c->Content}}</p>
                                                    <em>{{$c->created_at}}</em>
                                                    <div class="comment-review">
                                                        <span>Đánh Giá: <b>{{$c->Rate}} </b> <i class="fa fa-star" style="font-size:38px;color:red"></i> 
                                                        </span>   
                                                    </div>
                                                    
                                                </div>
                                                <div style="height: 50px;"></div>
                                            @endif
                                        @endforeach
                                    </div>

                                    <br>
                                    <hr style="border-top: 1px dashed blueviolet;">
                                    
                                    @if(Auth::user() != null)

                                    <form action="" method="POST" id="form-review">
                                        @csrf
                        
                                        <p class="your-opinion">
                                            <label>Đánh giá của bạn</label>
                                            <span id="ajaxStar" style="font-size: 30px;">
                                                <select id="rate" name="rate" class="star-rating">
                                                  <option selected value="1">1</option>
                                                  <option  value="2">2</option>
                                                  <option value="3">3</option>
                                                  <option value="4">4</option>
                                                  <option value="5">5</option>
                                                </select>
                                            </span>
                                        </p>
                                        <p class="feedback-form">
                                            <label for="feedback">Your Review</label>
                                            <textarea id="feedback" name="content" cols="45" rows="8" aria-required="true" maxlength="100"></textarea>
                                        </p>
                                        <span style="color: red; font-size: 20;" class="error-form-review"></span> 
                                        <div class="feedback-input">
                                            <div class="feedback-btn pb-15">                 
                                                <a href="javascript:"  onclick="AddReview({{$idTour->ID}}, {{Auth::user()->id}})">Submit</a>
                                            </div>
                                        </div>
                                    </form>
                                
                                    @else
                                    <div style="font-size: 25; color: red;"><br>
                                        Muốn đánh giá thì vui lòng đăng nhập trước ( <a href="admin/login">bấm vào đây để đăng nhập</a> )
                                    </div>
                                    @endif
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
            <!-- Product Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-30 pb-50">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>15 other products in the same category:</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    @foreach($tour as $t)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="DetailTour/{{$t->ID}}">
                                                    <img src="upload/tour/{{$t->Image}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="product-details.html">Graphic Corner</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="DetailTour/{{$t->ID}}">{{$t->Tour_Name}}</a></h4>
                                                    <div class="price-box">
                                                    <span class="new-price" style="color: red;">{{number_format($t->Price)}} VNĐ</span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                    <li class="add-cart"><a onclick="AddCart({{$t->ID}})" href="javascript:"> Add Cart <span class="add-cart-large"></span></a></li>
                                                        <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i>{{$t->views}}</a></li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Li's Laptop Product Area End Here -->
		</div>
	</div>
	<!-- /.row -->
</div>
<!-- end Page Content -->

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Đăng Ký</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-register">

                    @csrf

                    <div class="form-group" style="text-align: left">
                        <label for="email">Họ Tên:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                        <span class="error-form"></span>
                    </div>
                    <div class="form-group" style="text-align: left">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                        <span class="error-form"></span>
                    </div>
                    <div class="form-group" style="text-align: left">
                        <label for="pwd">Mật Khẩu:</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password"
                            id="pwd">
                        <span class="error-form"></span>
                    </div>
                    <button type="submit" class="btn btn-primary js-btn-login">Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

