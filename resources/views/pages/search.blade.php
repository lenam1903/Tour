
                            <div class="row">
                                <div class="col">
                                    @foreach($searchTour as $t)
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
                                                                style='font-size:26px'></i><b>
                                                                    @foreach($places as $p)
                                                                        @if($t->ID_Place == $p->ID)
                                                                            {{$p->Name_Places}}
                                                                        @endif
                                                                    @endforeach
                                                                </b></p>
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
                                                        <li class="wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                        <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i>{{$t->views}}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        