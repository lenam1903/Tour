@extends('layout.index')

@section('content')

<!-- Page Content -->
<div class="container-fluid">

    <div id="content" class="row main-left">
        <div class="col-md-12">
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h2 style="margin-top:0px; margin-bottom:0px;">Danh Sách Tour Đã Đặt </h2>
                            <form action="#" id="change-list-cart">
                                @if(Session::has("Cart") != null)
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        
                                        <thead>
                                            <tr>
                                                <th class="li-product-remove">STT</th>
                                                <th class="li-product-thumbnail">Ảnh</th>
                                                <th class="cart-product-name">Tên Tour</th>
                                                <th class="li-product-price">Giá Tour</th>
                                               
                                               
                                                <th class="li-product-remove">Xóa</th>
                                               
                                                <th class="li-product-remove">Thanh Toán</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; ?>
                                            
                                            @foreach(Session::get('Cart')->products as $item)
                                            <tr>
                                                <td class="li-product-name">{{$i++}}</td>
                                                <td class="li-product-thumbnail"><a href="DetailTour/{{$item['productInfo']->ID}}"><img width="100px"
                                                            height="100px"
                                                            src="upload/tour/{{$item['productInfo']->Image}}"
                                                            alt=""></a></td>
                                                <td class="li-product-price"><a
                                                        href="DetailTour/{{$item['productInfo']->ID}}">{{$item['productInfo']->Tour_Name}}</a></td>
                                                <td class="li-product-price"><span
                                                        class="amount">{{number_format($item['productInfo']->Price)}}
                                                        đ</span></td>
                                                {{-- <td class="quantity">

                                                    <div class="pro-qty">
                                                        <input id="quanty-item-{{$item['productInfo']->ID}}"
                                                            style="color:blue" required type="number"
                                                            value="{{$item['quanty']}}" min="0" max="99" />
                                                    </div>
                                                </td> --}}
                                                {{-- <td class="li-product-price"><span
                                                        class="amount">{{number_format($item['quanty'] * $item['productInfo']->Price)}}
                                                        đ</span></td> --}}
                                                <td class="li-product-remove"><a href="javascript:"><i
                                                            onclick="DeleteListItemCart({{$item['productInfo']->ID}})"
                                                            class="fa fa-times"></i></a></td>
                                                {{-- <td><i id="saveQuanty-{{$item['productInfo']->ID}}"
                                                        onclick="SaveListItemCart({{$item['productInfo']->ID}})"
                                                        quantyMax="{{$item['productInfo']->Number_Of_Seats_Available}}"
                                                        class="fa fa-save" style="font-size:36px;"></i></td> --}}
                                                <td class="li-product-remove"><a href="check-out/{{$item['productInfo']->ID}}"><img width="100px"
                                                            height="100px" src="upload/tour/checkout.png"
                                                            alt="Thanh Toán"></a></td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">

                                            <ul>
                                                <li>Tổng Số Lượng: <span>{{Session::get('Cart')->totalQuanty}}</span>
                                                </li>
                                                <li>Tổng Tiền:
                                                    <span>{{number_format(Session::get('Cart')->totalPrice)}}</span>
                                                </li>
                                            </ul>
                                           
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                        <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd">
                        <span class="error-form"></span>
                    </div>
                    <button type="submit" class="btn btn-primary js-btn-login">Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>
</div>
    @endsection