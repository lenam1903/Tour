@extends('layout.index')

@section('content')
@if(Session::has("Cart") != null)
@if(Auth::check())
<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="col-md-12" style="text-align: center; padding-bottom: 50px; color: red;">
            <h2 style="font-size: 50px;">Thông tin liên lạc</h2>
        </div>
        <div class="col-md-12" style="text-align: center; color: green">
            <h2>Giá Tour cơ bản</h2>
        </div>
        <div class="page-section mb-60">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 mb-30">
                        <!-- Login Form s-->

                        <div style="border-top: 1px dashed;">
                            <!-- Begin Footer Shipping Area -->
                            <div class="footer-shipping pt-60 pb-55 pb-xs-25" style="padding-left: 10%;">
                                <div class="row">
                                    <!-- Begin Li's Shipping Inner Box Area -->
                                    <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                        <div class="li-shipping-inner-box">
                                            <div class="shipping-text">
                                                <h2 style="border-bottom: 1px solid; padding-bottom: 27px"> Người
                                                    lớn (Từ 12 tuổi trở lên)</h2>
                                                <p style="color: red;">{{$idTour->Price }} VNĐ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Li's Shipping Inner Box Area End Here -->
                                    <!-- Begin Li's Shipping Inner Box Area -->
                                    <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55"
                                        style="border-left: 1px solid">
                                        <div class="li-shipping-inner-box">
                                            <div class="shipping-text">
                                                <h2 style="border-bottom: 1px solid">Trẻ em (Từ 5 tuổi đến dưới 12
                                                    tuổi)</h2>
                                                <p style="color: red;">{{$idTour->Price * (75/100)}} VNĐ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Li's Shipping Inner Box Area End Here -->
                                    <!-- Begin Li's Shipping Inner Box Area -->
                                    <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30" style="border-left: 1px solid">
                                        <div class="li-shipping-inner-box">
                                            <div class="shipping-text">
                                                <h2 style="border-bottom: 1px solid; padding-bottom: 27px">Em bé
                                                    (Dưới 5 tuổi) </h2>
                                                <p style="color: red;">{{$idTour->Price * (50/100)}} VNĐ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Li's Shipping Inner Box Area End Here -->
                                    <!-- Begin Li's Shipping Inner Box Area -->
                                    <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30" style="border-left: 1px solid">
                                        <div class="li-shipping-inner-box">
                                            <div class="shipping-text">
                                                <h2 style="border-bottom: 1px solid; padding-bottom: 27px">Phụ thu
                                                    phòng đơn </h2>
                                                <p style="color: red;">1,000,000 VNĐ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Li's Shipping Inner Box Area End Here -->
                                </div>
                            </div>
                            <!-- Footer Shipping Area End Here -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <form action="#" method="POST">
            {{ csrf_field() }}
        <div class="row">
           
            
            <div class="col-lg-6 col-6">
                
                    <div class="checkbox-form">
                        <div class="row" style="padding-top: 50px;">
                            <div class="col-md-12" style="padding: 10px;">
                                <div class="">
                                    <label>Họ Và tên <span style="color: red;" class="required">*</span></label>
                                    <input id="fullName" style="font-size: 20;" type="text" maxlength="50"
                                        class="form-control" required="required" 
                                        name="fullName" placeholder="Nhập Họ và Tên" value="{{Auth::user()->Full_Name}}">
                                        <span class="error-form er"></span>     
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="">
                                    <label>Email <span style="color: red;" class="required">*</span></label>
                                    <input style="font-size: 20;" type="email" class="form-control" name="email"
                                        maxlength="50" id="email" required="required" placeholder="Nhập Email" value="{{Auth::user()->email}}">
                                        <span class="error-form er"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <label>Số điện thoại <span style="color: red;" class="required">*</span></label>
                                    <input required id="numberPhone" class="form-control" placeholder="Nhập SĐT"
                                        style="font-size: 20;" type="number" name="number"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                        onKeyDown="if(this.value.length==13 && event.keyCode!=8) return false;" value="{{Auth::user()->Phone_Number}}">
                                        <span class="error-form er"></span>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-top: 10px;">
                                <div >
                                    <label>Địa chỉ <span style="color: red;" class="required">*</span></label>
                                    <input name="address" maxlength="100"  id="address" style="font-size: 20;" type="text" class="form-control"
                                        placeholder="Nhập Địa Chỉ" value="{{Auth::user()->Address}}">
                                        <span class="error-form er"></span>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-top: 10px;">
                                <div >
                                    <label>Ghi chú <span class="required"></span></label>
                                    <textarea placeholder="Nhập Ghi Chú" maxlength="100" rows="4" cols="20" id="note"
                                        name="note" type="text"></textarea>
                                        <span class="error-form er"></span>
                                </div>
                            </div>
                            
                            <div class="col-md-6" style="padding-top: 50px;">
                                <div class="checkout-form-list">
                                    <label>Người lớn <span style="color: red;" class="required">*</span></label>
                                    <input class="form-control" onblur="adultAjax({{$idTour->ID}})"
                                        onclick="javascript:show_text('Từ 12 tuổi trở lên',this)" id="adult" value="1" name="adult"
                                        max="99" min="1" style="font-size: 20;" type="number"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                        onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;">
                                </div>
                            </div>
                            <div class="col-md-6" style="padding-top: 50px;">
                                <div class="checkout-form-list">
                                    <label>Trẻ em <span class="required"></span></label>
                                    <input class="form-control" onblur="childrenAjax({{$idTour->ID}})"
                                        onclick="javascript:show_text('Từ 5 tuổi đến dưới 12 tuổi',this)" id="children" name="children"
                                        value="0" max="99" min="0" style="font-size: 20;" type="number"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                        onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Em bé <span class="required"></span></label>
                                    <input class="form-control" onblur="babyAjax({{$idTour->ID}})"
                                        onclick="javascript:show_text('Dưới 5 tuổi',this)" id="baby" value="0" max="99" name="baby"
                                        min="0" style="font-size: 20;" type="number"
                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                        onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Số khách <span class="required"></span></label>
                                    <input name="guestNumber" id="guestNumber" guestNumberMax="{{$idTour->Number_Of_Seats_Available}}"
                                        style="font-size: 20;" type="number" class="form-control" value="1" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
       
            <div class="col-lg-6 col-6">
                <div class="your-order">
                    <h3><a href="DetailTour/{{$idTour->ID}}">Thông tin Tour</a></h3>
                    <div class="row single-product-area">
                        <div class="col-lg-9 col-md-6" style="margin: auto;">
                            <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="image/product/large-size/1.jpg"
                                            data-gall="myGallery">
                                            <a href="DetailTour/{{$idTour->ID}}"><img width="500px" height="300px"
                                                    src="upload/tour/{{$idTour->Image}}" alt=""></a>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>

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
                                                    style='font-size:26px'></i>Điểm Đến: <a href="#" target="_blank"
                                                    class="b"
                                                    style="color: black"><b>{{$idTour->Place_Of_Departure}}</b></a></div>
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
                                    <div class="product-desc" style="padding-top: 50px">Mô Tả
                                        <p>
                                            <span>
                                                <b ><p > {!! substr($idTour->Describe, 0 , 900) !!}...</p></b>
                                            </span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-group col-md-12">
                <div class="form-row" >
                    <div class="col-md-9">
                        <div style="font-size: 20;">
                            <p style="font-size: 20;"><b>Khách hàng (Người lớn 1)</b></p>
                            <label>Họ và tên <span class="required" style="color: red;">*</span></label>
                            <input required id="fullNameAdult1" style="font-size: 20;" type="text" maxlength="50" name="Adult1[]"
                                class="form-control" placeholder="Nhập Họ và Tên" value="{{Auth::user()->Full_Name}}">
                                <span class="error-form er"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="country-select clearfix" style="padding-top:45px;">
                            <label>Giới tính <span class="required"></span></label>
                            <select  class="form-control" name="Adult1[]" id="genderAdult1">
                                <option selected value="Nữ">Nữ</option>
                                <option value="Nam">Nam</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="checkout-form-list">
                            <label>Độ tuổi <span class="required"></span></label>
                            <input  id="ageAdult1" style="font-size: 20;" type="text" name="Adult1[]" class="form-control" value="Người Lớn"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="checkout-form-list">
                            <label>Ngày sinh <span style="color: red;" class="required">*</span></label>
                            <input required id="dateCheckoutAdult1" onblur="departureDay(this.id, this.value)"
                                tourTime="{{$idTour->Tour_Time}}" departureDay="{{$idTour->Departure_Day}}" type="date"
                                name="Adult1[]" placeholder="Nhập Ngày Khởi Hành" value="" />
                                <span class="error-form er"></span> 
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="checkout-form-list">
                            <label id="test">Phòng đơn <span class="required"></span></label>
                            <input style="text-align: center; font-size: 20;" class="form-control" name="Adult1[]"
                                id="singleRoomAdult1" value="Có" readonly />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label>Giá Tiền:</label>
                            <input style="text-align: center; font-size: 20; color: red;" class="form-control" name="Adult1[]"
                                id="priceAdult1" maxprice="{{$idTour->Price + 1000000}}" value="{{$idTour->Price + 1000000}}" readonly />
                    </div>
                </div>
            </div>

            <div id="formAdult" class="form-group col-md-12"></div>
            <div id="formChildren" class="form-group col-md-12"></div>
            <div id="formBaby" class="form-group col-md-12"></div>

            <div class="form-group col-md-12" style="text-align:right;">
                Tổng Tiền (đã tính thuế VAT(+10%):<label style="font-size: 20; font-weight: bold; color: red;" id="tongTien"
                    for="tongTien">{{(($idTour->Price + 1000000)*(0.1))+($idTour->Price + 1000000)}}</label>
            </div>
            <div class="col-md-3">
                <div style="font-size: 20;">
                    <label>Mã Giảm Giá: </label>
                    <input id="voucher" style="font-size: 20; margin-right: 100px;" type="text" maxlength="50"
                        class="form-control" placeholder="Nhập Mã Giảm Giá" name="voucher">
                        <span class="error-form er"></span>
                </div>
            </div>
            <div class="col-md-12" style="padding-top: 20px;">
                <div class="checkout-form-list">
                    <label>Phương Thức Thanh Toán <span style="color: red;" class="required">*</span></label>
                    <select  class="form-control" name="payments">
                        <option selected value="Tiền Mặt">Tiền Mặt</option>
                        <option value="ATM">ATM</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12" style="padding-top: 20px;">
                <div class="checkout-form-list">
                   
                    <input type="checkbox" id="rules" name="rules" value="1" /> <label for="rules"><br>Tôi đồng ý với các điều kiện trên  <span style="color: red; font-size: 20;" class="required">*</span> </label>
                </div>
            </div>
           
   
            <div class="form-group col-md-12">
                <button id="btnCheckoutInfo" onclick="postCheckOutInfo({{$idTour->ID}}, {{Auth::user()->id}})"
                    style="text-align: center; color: chartreuse; font-size: 20;" type="button" class="btn btn-primary">Đặt
                    Tour</button>
            </div>
        </form>
    </div>
</div>
    

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
<!--Checkout Area End-->
@endsection

@else

<p style="font-size: 30px; color: red;">Vui lòng đăng nhập rồi qua lại thanh toán</p>
@endif

@endif