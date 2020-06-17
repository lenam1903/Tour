<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    a.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +65 11.188.888
                </div>
            </div>
            <div class="ht-right">


                <div class="top-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                    <a href="#"><i class="ti-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="#">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="advanced-search">
                        <button type="button" class="category-btn">All Categories</button>
                        <form action="#" class="input-group">
                            <input type="text" placeholder="What do you need?">
                            <button type="button"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">
                        <li class="heart-icon"><a href="#">
                                <i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                        </li>
                        <li class="cart-icon"><a>
                                <i class="icon_bag_alt"></i>
                                @if(Session::has("Cart") != null)
                                <span id="total-quanty-show">
                                    {{Session::get('Cart')->totalQuanty}}</span>
                                @else
                                <span id="total-quanty-show">0</span>
                                @endif
                            </a>
                            <div class="cart-hover">
                                <div id="change-item-cart">
                                    @if(Session::has("Cart") != null)

                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @foreach(Session::get('Cart')->products as $item)
                                                <tr>
                                                    <td class="si-pic"><img width="100px" height="100px"
                                                            src="upload/tour/{{$item['productInfo']->Image}}" alt="">
                                                    </td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p id="quantyCart-{{$item['productInfo']->ID}}"
                                                                style="width: max-content;"
                                                                quantyCart="{{$item['quanty']}}"
                                                                quantyCartMax="{{$item['productInfo']->Number_Of_Seats_Available}}">
                                                                {{number_format($item['productInfo']->Price)}} ₫ x
                                                                {{$item['quanty']}}</p>
                                                            <h6>{{$item['productInfo']->Tour_Name}}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close" data-id="{{$item['productInfo']->ID}}"></i>

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>{{number_format(Session::get('Cart')->totalPrice)}}₫</h5>
                                    </div>

                                    @endif
                                </div>

                                <div class="select-button">
                                    <input type="button" value="Xem" class="list-cart" listCart="listCart"
                                        style="width: 100%; height: 50px; background-color: green; text-align:center">
                                </div>
                            </div>
                        </li>
                        <!-- Navigation -->

                        <!-- Example single danger button -->

                        <li class="dropdown">
                            <nav class="navbar navbar-default navbar-static-top" role="navigation"
                                style="margin-bottom: 0">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user" style="font-size:48px;color:blue"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user" style="text-align: center;">
                                    @if(Auth::check())
                                    <li><i class="fa fa-user"
                                            style="font-size:20px;color:blue">{{Auth::user()->email}}</i>
                                    </li>
                                    <li><a href="admin/user/edit/{{Auth::user()->id}}"><i
                                                class="fa fa-gear fa-fw"></i>Settings</a>
                                    </li>
                                    <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                    </li>
                                    @else
                                    <li style="margin: auto;"><button type="button"
                                            class="btn btn-primary js-modal-register">
                                            Đăng Ký
                                        </button></li>
                                    @endif
                                </ul>
                        </li>
                        <!-- /.dropdown -->
                        </nav>
                        <!-- /.navbar-top-links -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>All departments</span>
                    <ul class="depart-hover">
                        <li class="active"><a href="#">Women’s Clothing</a></li>
                        <li><a href="#">Men’s Clothing</a></li>
                        <li><a href="#">Underwear</a></li>
                        <li><a href="#">Kid's Clothing</a></li>
                        <li><a href="#">Brand Fashion</a></li>
                        <li><a href="#">Accessories/Shoes</a></li>
                        <li><a href="#">Luxury Brands</a></li>
                        <li><a href="#">Brand Outdoor Apparel</a></li>
                    </ul>
                </div>
            </div>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Collection</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Pages</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>

</header>
<!-- Header End -->