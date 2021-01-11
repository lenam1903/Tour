@extends('layout.index')

@section('content')
  
<!--Checkout Area Strat-->
@if(Auth::check())
<?php 
    $i =1;
    $i1 = 1;
    $i2 = 1;
    $i3 = 1;
    $i4 = 1;
?>
<div class="col-md-12" style="text-align: center; height: 200px; ">
    <h5 style="background-color: #f2f2f2 ; padding-bottom: 20px; padding-top: 20px">Hóa Đơn</h5>
</div>
@if($bill != null)
@foreach($bill as $b)
@if($b->ID_Users == Auth::user()->id)
<div class="checkout-area pt-60 pb-30">
    <div class="container-fluid">
        
        <div class="row">
           
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>PHIẾU XÁC NHẬN BOOKING ({{$i++}}) </h3>
                    <div class="row single-product-area">
                        <div class="col-lg-12 col-md-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"><i class="fas fa-barcode"></i> Mã tour :</div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-9 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> {{$b->tour->Tour_Code}} </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> Tên tour : </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-9 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> {{$b->tour->Tour_Name}}</div>
                                            <div class="clear"></div>
                                        </div>
                                   
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> <i class="far fa-calendar-alt"></i> Ngày khởi hành: </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-9 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> {{$b->tour->Departure_Day}}</div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> <i class="far fa-clock"></i> Số ngày đi: </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-9 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> {{$b->tour->Tour_Time}} </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> Phương Tiện: </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-9 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"><span class="font500">
                                                <?php
                                                    if(is_numeric(strpos($b->tour->Transportation ,  'bicycle'))){
                                                        echo $bicycle = str_replace( $b->tour->Transportation, '<i class="fa fa-bicycle" style="font-size:24px"></i>&nbsp;', $b->tour->Transportation );
                                                    }

                                                    if(is_numeric(strpos($b->tour->Transportation ,  'planes'))){
                                                        echo $planes = str_replace( $b->tour->Transportation, '<i class="fa fa-plane" style="font-size:24px"></i>&nbsp;', $b->tour->Transportation );
                                                    }
                                
                                                    if(is_numeric((strpos($b->tour->Transportation ,  'car')))){
                                                        echo $car = str_replace( $b->tour->Transportation, '<i class="fa fa-car" style="font-size:24px"></i>&nbsp;', $b->tour->Transportation );
                                                    }
                                              
                                                    if(is_numeric(strpos($b->tour->Transportation ,  'motorbike'))){
                                                        echo $motorbike = str_replace( $b->tour->Transportation, '<i class="fa fa-motorcycle" style="font-size:24px"></i>&nbsp;', $b->tour->Transportation );
                                                    }
                                                ?>
                                            </span> </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> Nơi khởi hành : </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-9 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> Hồ Chí Minh </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>THÔNG TIN LIÊN LẠC ({{$i1++}})</h3>
                    <div class="row single-product-area">
                        <div class="col-lg-12 col-md-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> Họ tên : </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-10 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> {{$b->Full_Name}}</div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> Địa chỉ : </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-10 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> {{$b->Address}}</div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> Di động : </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-10 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> {{$b->Phone_Number}} </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> Email : </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-10 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> {{$b->Email}} </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> Số khách : </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-10 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> {{$b->Guest_Number}} Người</div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> Ghi chú : </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-10 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> {{$b->Note}}</div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-12" style="padding-top: 20px">
                <div class="your-order">
                    <h3 style="text-align: center;">CHI TIẾT BOOKING ({{$i2++}})</h3>
                    <div class="row single-product-area">
                        <div class="col-lg-12 col-md-6">
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> Số booking : </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-10 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> {{$b->Bill_Code}} (Quý khách vui lòng nhớ số booking (Booking No) để thuận tiện cho các giao dịch sau này) </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> Trị giá booking : </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-10 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"><b style="color: red;">{{number_format($b->Total_Price)}}
                                                        đ</b> (đã tính thuế VAT(+10%)</div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l">Ngày đăng ký : </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-10 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> {{$b->Date_Of_Payment}} (Theo giờ Việt Nam) </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> Hình thức thanh toán : </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-10 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> {{$b->Payments}} </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l"> Tình trạng : </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-lg-10 col-md-4 col-sm-6 col-xs-12 mg-bot10">
                                            <div class="f-left l" id="f-left"> @if($b->Payments != "Số dư")
                                                Sau 24h kể từ Ngày đăng ký ({{$b->Date_Of_Payment}}) (Theo giờ Việt Nam) (Nếu quá thời hạn trên mà quý khách chưa thanh toán. Sẽ hủy booking này)
                                                @else
                                                Đã thanh toán
                                                @endif</div>
                                            <div class="clear"></div>
                                        </div>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-12" style="padding-top: 20px">
                <div class="your-order">
                    <h3 style="text-align: center;">DANH SÁCH KHÁCH HÀNG ĐI TOUR ({{$i3++}})</h3>
                    <div class="row single-product-area">
                       
                     
                        <table class="tour" style="text-align: center;">
                            <tr>
                                <th>
                                    Họ Tên
                                </th>
                                <th>
                                    Giảm giá?
                                </th>
                                <th>
                                    Ngày sinh
                                </th>
                                <th>
                                    Giới tính
                                </th>
                                <th>
                                    Độ tuổi
                                </th>
                                <th>
                                    Phòng đơn
                                </th>
                                <th>
                                    Trị giá
                                </th>
                            </tr>
                            @foreach($billDetails as $bd)
                            @if($bd->ID_Bill == $b->ID)
                            <tr>
                                <td>
                                    {{$bd->Full_Name}}
                                </td>
                                <td>
                                    Giảm giá?
                                </td>
                                <td>
                                    {{$bd->Date_Of_Birth}}
                                </td>
                                <td>
                                    {{$bd->Gender}}
                                </td>
                                <td>
                                    {{$bd->Age}}
                                </td>
                                <td>
                                    {{$bd->Single_Room}}
                                </td>
                                <td>
                                    {{number_format($bd->Price)}} đ
                                </td>
                              
                            </tr>
                            
                           
                            @endif
                            @endforeach
                            
                            <tr id="valuetour">
                                <td colspan="8">Tổng cộng:<b style="color: red;">{{number_format($b->Total_Price)}}
                                                         đ</b> (đã tính thuế VAT(+10%)</td> 
                                                         
                             </tr>

                             <tr id="valuetour">
                                <td colspan="8">Số Dư Còn:<b style="color: red;">{{number_format($b->soDu)}}
                                                         đ</b> </td> 
                                                         
                             </tr>
                           
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12" style="text-align: center; height: 200px; ">
        <h5 style="background-color:green ; padding-bottom: 20px; padding-top: 20px">({{$i4++}})</h5>
    </div>
</div>

@endif
@endforeach


@endif
@endif
<!--Checkout Area End-->
@endsection