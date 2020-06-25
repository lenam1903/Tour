@if(Session::has("Cart") != null)

@for($i=1 ; $i <= $baby; $i++)

<div class="col-md-12" style="height: 50px;"></div>
<div class="col-md-12" style="height: 50px; font-size: 20;"><b>Khách Hàng (Em Bé {{$i}})</b></div>

    {{ csrf_field() }}

    <div class="form-row">

        <div class="form-group col-md-9">
            <label for="fullNameBaby{{$i}}">Họ Tên: (<span style="color: red;">*</span>)
            </label>
            <input id="fullNameBaby{{$i}}" style="font-size: 20;" type="text" maxlength="50" class="form-control"
                placeholder="Nhập Họ và Tên">
        </div>
        <div class="form-group col-md-3">
            <label for="genderBaby{{$i}}">Giới Tính:</label>
            <select class="form-control" name="genderBaby{{$i}}" id="genderBaby{{$i}}">
                <option selected value="0">Nữ</option>
                <option value="1">Nam</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="ageBaby{{$i}}">Độ Tuổi </label>
            <input id="ageBaby{{$i}}" style="font-size: 20;"
                        type="text" class="form-control" value="Em Bé" readonly>
        </div>
        <div class="form-group col-md-3">
            <label>Ngày Sinh</label>
            <input id="dateCheckoutBaby{{$i}}" onblur="departureDay(this.id, this.value)" tourTime="{{$idTour->Tour_Time}}" type="date" name="dateCheckoutBaby{{$i}}"
                placeholder="Nhập Ngày Khởi Hành" />
        </div>
        <div class="form-group col-md-3">
            <label for="singleRoomBaby{{$i}}">Phòng Đơn:</label>
                <select onchange="singleRoom(this.value, {{$i}}, {{$idTour->Price * (50/100)}}, this.id)" class="form-control" name="singleRoomBaby{{$i}}" id="singleRoomBaby{{$i}}">
                <option selected value="0">Không</option>
                <option value="1">Có</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            Giá Tiền:<label style="text-align: center; font-size: 20; color: red;" id="priceBaby{{$i}}"
                maxprice="{{$idTour->Price + 1000000}}" for="priceBaby{{$i}}">{{$idTour->Price * (50/100)}}</label>
        </div>
    </div>

    <div class="col-md-12" style="height: 50px;"></div>
@endfor



@endif
