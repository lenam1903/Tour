@if(Session::has("Cart") != null)

<div class="panel-heading" style="background-color:#337AB7; color:white;">
    <h2 style="margin-top:0px; margin-bottom:0px;">Danh Sách Tour Đã Đặt </h2>
</div>
<div class="panel-body"
    style="background-image: url(image/background1.jpg); background-repeat: no-repeat; position: relative;background-size: cover;">
    <!-- item -->

    <div class="row">
        <div class="col-lg-12" id="list-card">

            <div>
                         
                <table class="table table-striped table-dark">
                    <?php $i=1; ?>
                    @if(Session::has("Cart") != null)
                    @foreach(Session::get('Cart')->products as $item)
                    <tr>
                        <th style="padding: 1em;">STT</th>
                        <td style="padding: 1em;">{{$i++}}</td>
                        <td style="padding: 50px;" class="close-td"><i id="saveQuanty-{{$item['productInfo']->ID}}"
                                onclick="SaveListItemCart({{$item['productInfo']->ID}})" quantyMax="{{$item['productInfo']->Number_Of_Seats_Available}}" class="ti-save"></i></td>
                        <td style="padding: 50px;" class="close-td">
                            <div><i class="ti-close" onclick="DeleteListItemCart({{$item['productInfo']->ID}})"></i>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <th>Ảnh</th>
                        <td class="cart-pic"><img width="100px" height="100px"
                                src="upload/tour/{{$item['productInfo']->Image}}" alt=""></td>
                        <td onclick="CheckOutInfo({{$item['productInfo']->ID}})"  colspan="2" style="text-align: center; background-color: burlywood;"><img width="100px"
                                height="100px" src="upload/tour/checkout.png" alt="Thanh Toán"></td>

                    </tr>
                    <tr>
                        <th>Mã Tour</th>
                        <td style="padding: 1em;">{{$item['productInfo']->Tour_Code}}</td>
                    </tr>

                    <tr>
                        <th>Tên Tour</th>
                        <td style="padding: 1em;">{{$item['productInfo']->Tour_Name}}</td>
                    </tr>
                    <tr>
                        <th>Giá Tour</th>
                        <td style="padding: 1em;">{{number_format($item['productInfo']->Price)}} đ</td>
                    </tr>
                    <tr>
                        <th>Số Lượng</th>
                        <td>
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input id="quanty-item-{{$item['productInfo']->ID}}" style="color:blue" required
                                        type="number" value="{{$item['quanty']}}" min="0" max="100" />
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Tổng Giá</th>
                        <td class="total-price">{{number_format($item['quanty'] * $item['productInfo']->Price)}} ₫</td>
                    </tr>


                    <tr>
                        <th></th>
                        <td style="padding: 1em;width: 100%;">
                            <hr style="color: red; width: 100%; border-radius: 1px; border: 1px solid green;">
                            <br><br><br><br><br>
                        </td>
                    </tr>

                    @endforeach
                    @endif



                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 offset-lg-8">
                    <div class="proceed-checkout">
                        <ul>
                            <li class="subtotal">Tổng Số Lượng <span>{{Session::get('Cart')->totalQuanty}}</span></li>
                            <li class="cart-total">Tổng Tiền
                                <span>{{number_format(Session::get('Cart')->totalPrice)}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif