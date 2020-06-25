@if(Session::has("Cart") != null)

@for($i=1 ; $i <= $children; $i++)

<div class="col-md-12" style="height: 50px;"></div>
<div class="col-md-12" style="height: 50px; font-size: 20;"><b>Khách Hàng (Trẻ Em {{$i}})</b></div>

    {{ csrf_field() }}

    <div class="form-row">

        <div class="form-group col-md-9">
            <label for="fullNameChildren{{$i}}">Họ Tên: (<span style="color: red;">*</span>)
            </label>
            <input id="fullNameChildren{{$i}}" style="font-size: 20;" type="text" maxlength="50" class="form-control" placeholder="Nhập Họ và Tên">
        </div>
        <div class="form-group col-md-3">
            <label for="genderChildren{{$i}}">Giới Tính:</label>
            <select class="form-control" name="genderChildren{{$i}}" id="genderChildren{{$i}}">
                <option selected value="0">Nữ</option>
                <option value="1">Nam</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="ageChildren{{$i}}">Độ Tuổi </label>
            <input id="ageChildren{{$i}}" style="font-size: 20;"
                        type="text" class="form-control" value="Trẻ Em" readonly>
        </div>
        <div class="form-group col-md-3">
            <label>{{$idTour->Departure_Day}}</label>
            <input id="dateCheckoutChildren{{$i}}" onblur="departureDay(this.id, this.value, {{$idTour->Tour_Time}})" type="date" name="dateCheckoutChildren{{$i}}"
                placeholder="Nhập Ngày Khởi Hành" />
        </div>
        <div class="form-group col-md-3">
            <label for="singleRoomChildren{{$i}}">Phòng Đơn:</label>
                <select onchange="singleRoom(this.value, {{$i}}, {{$idTour->Price * (75/100)}}, this.id)" class="form-control" name="singleRoomChildren{{$i}}" id="singleRoomChildren{{$i}}">
                <option selected value="0">Không</option>
                <option value="1">Có</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            Giá Tiền:<label style="text-align: center; font-size: 20; color: red;" id="priceChildren{{$i}}"
                maxprice="{{$idTour->Price + 1000000}}" for="priceChildren{{$i}}">{{$idTour->Price * (75/100)}}</label>
        </div>
    </div>

    <div class="col-md-12" style="height: 50px;"></div>
@endfor



@endif
