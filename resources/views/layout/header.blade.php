<!-- Begin Header Area -->
<header>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap">
                            <li><span>Telephone :</span><a href="#"> 0333 766 842 </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="home">
                            <img src="image/menu/logo/travel.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                <input maxlength="50" id="search" name="search" type="text" value="" placeholder="Enter your search key ..." style="width: 80%;">
                        <button id="btn-search" style="margin-right: 150px;" class="li-btn" type="button"><i class="fa fa-search"></i></button>
                    
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            {{-- <li class="hm-wishlist">
                                <a href="wishlist.html" style="padding-top: 11.2px">
                                    <span class="cart-item-count wishlist-item-count">0</span>
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </li> --}}

                            <li id="userLogo" class="hm-wishlist">
                                
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-user" style="font-size:48px;color:blue"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user" style="text-align: center;">
                                        @if(Auth::check())
                                        <li><i
                                                style="font-size:20px;color:blue">{{Auth::user()->email}}</i>
                                        </li>
                                        <li><a href="Bill"><i></i> Hóa đơn</a>
                                        </li>
                                        <li><a href="admin/user/edit/{{Auth::user()->id}}"><i
                                                    ></i>Cài đặt</a>
                                        </li>
                                        <li><a href="logout"><i></i> Đăng xuất</a>
                                        </li>
                                        @else
                                        <li style="margin: auto; padding: 20px;"><a href="javascript:"><button type="button"
                                                class="btn btn-primary js-modal-login">
                                                Đăng nhập
                                            </button></a></li>
                                            <li style="margin: auto;"><button type="button"
                                                class="btn btn-primary js-modal-register">
                                                Đăng ký
                                            </button></li>
                                        @endif
                                    </ul>
                            </li>

                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <li id="iconCart" class="hm-minicart">
                                <div  class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    @if(Session::has("Cart") != null)
                                    <span id="total-price" class="item-text">-
                                        <span id="total-quanty-show" class="cart-item-count">*</span>
                                    </span>
                                    @else
                                    <span  id="total-price"  class="item-text">-
                                        <span id="total-quanty-show" class="cart-item-count">0</span>
                                    </span>
                                    @endif
                                </div>
                                <span></span>
                                <div id="change-item-cart" class="minicart">
                                    @if(Session::has("Cart") != null)
                                    <ul class="minicart-product-list">
                                        @foreach(Session::get('Cart')->products as $item)
                                        <li>
                                            <a href="DetailTour/{{$item['productInfo']->ID}}" class="minicart-product-image">
                                                <img width="200" height="70px"
                                                    src="upload/tour/{{$item['productInfo']->Image}}">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a
                                                        href="DetailTour/{{$item['productInfo']->ID}}">{{$item['productInfo']->Tour_Name}}</a>
                                                </h6>
                                                <span id="quantyCart-{{$item['productInfo']->ID}}"
                                                    quantyCart="0"
                                                    quantyCartMax="{{$item['productInfo']->Number_Of_Seats_Available}}">{{number_format($item['productInfo']->Price)}}
                                                    đ</span>
                                            </div>
                                            <button id="deleteItemCart" onclick="deleteItemCart({{$item['productInfo']->ID}})" class="close" title="Remove"> X
                                                
                                            </button>
                                        </li>
                                        @endforeach
                                    </ul>

                                    <p class="minicart-total">Tổng TIền:
                                        <span id="totalPrice" >{{number_format(Session::get('Cart')->totalPrice)}} đ</span></p>
                                    <input hidden id="total-quanty-cart" type="number"
                                        value="{{Session::get('Cart')->totalQuanty}}">
                                   
                                    <div class="minicart-button">
                                        <a href="List-Cart" style="color: brown;" class="li-button li-button-fullwidth">
                                            Thanh Toán
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom mb-0 header-sticky stick d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu">
                        <nav>
                            <ul>
                                <li class="dropdown-holder"><a href="#">Du lịch</a>
                                    <ul class="hb-dropdown">
                                        <li><a href="#">Du lịch ngoài nước</a></li>
                                        <li><a href="#">Du lịch trong nước</a></li>
                                        <li><a href="#">Du lịch tự chọn</a></li>
                                        <li><a href="#">Du học</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-holder"><a href="#">Vận chuyển</a>
                                    <ul class="hb-dropdown">
                                        <li><a href="#">Thuê xe</a></li>
                                        <li><a href="#">Vé máy bay</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-holder"><a href="#">Tin tức</a>
                                    <ul class="hb-dropdown">
                                        <li><a href="#">Tin tức</a></li>
                                        <li><a href="#">Cẩm nang du lịch</a></li>
                                        <li><a href="#">Kinh nghiệm du lịch</a></li>
                                        <li><a href="#">Thông tin visa</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-holder"><a href="#">Khuyến mãi</a>
                                    <ul class="hb-dropdown">
                                        <li><a href="#">Mua tour trả chậm 0%</a></li>
                                        <li><a href="#">Ưu đãi VNPay</a></li>
                                        <li><a href="#">Ưu đãi Coopmart</a></li>
                                        <li><a href="#">Hoàn tiền cùng MSB</a></li>
                                        <li><a href="#">Hoàn tiền cùng Sacombank</a></li>
                                    </ul>
                                </li>
                                <li style="padding-left: 20px"><a href="#">Khách sạn</a></li>
                                <li><a href="#">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
</header>
<!-- Header Area End Here -->