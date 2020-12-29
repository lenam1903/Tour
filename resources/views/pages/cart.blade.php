@if(Session::has("Cart") != null)

<ul class="minicart-product-list">
    @foreach(Session::get('Cart')->products as $item)
    <li>
        <a href="DetailTour/{{$item['productInfo']->ID}}" class="minicart-product-image">
            <img width="200" height="80px" src="upload/tour/{{$item['productInfo']->Image}}">
        </a>
        <div class="minicart-product-details">
            <h6><a href="DetailTour/{{$item['productInfo']->ID}}">{{$item['productInfo']->Tour_Name}}</a></h6>
            <span id="quantyCart-{{$item['productInfo']->ID}}" 
                quantyCart="0"
                quantyCartMax="{{$item['productInfo']->Number_Of_Seats_Available}}">{{number_format($item['productInfo']->Price)}} đ
                        </span>
        </div>
        <button id="deleteItemCart" onclick="deleteItemCart({{$item['productInfo']->ID}})" class="close" title="Remove"> X
                                                
        </button>
    </li>
    @endforeach
</ul>

<p class="minicart-total">Tổng TIền: <span id="totalPrice">{{number_format(Session::get('Cart')->totalPrice)}} đ</span></p>
{{-- <input hidden id="total-quanty-cart" type="number" value="{{Session::get('Cart')->totalQuanty}}"> --}}

<div class="minicart-button">
    <a href="List-Cart" style="color: brown;" class="li-button li-button-fullwidth">
        Thanh Toán
    </a>
</div>
@endif