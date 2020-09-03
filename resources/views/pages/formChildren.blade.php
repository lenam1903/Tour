@if(Session::has("Cart") != null)

@for($i=1 ; $i <= $children; $i++)

<div class="col-md-12" style="height: 50px;"></div>
<div class="col-md-12" style="height: 50px; font-size: 20;"><b>Khách Hàng (Trẻ Em {{$i}})</b></div>

    {{ csrf_field() }}

    <div class="form-row">

        <div class="col-md-9">
            <label for="fullNameChildren{{$i}}">Họ Tên: (<span style="color: red;">*</span>)
            </label>
            <input name="Children{{$i}}[]" required id="fullNameChildren{{$i}}" style="font-size: 20;" type="text" maxlength="50" class="form-control" placeholder="Nhập Họ và Tên">
            <span class="error-form"></span>
        </div>
        <div class="form-group col-md-3">
            <label for="genderChildren{{$i}}">Giới Tính:</label>
            <select class="form-control" name="Children{{$i}}[]" id="genderChildren{{$i}}">
                <option selected value="Nữ">Nữ</option>
                <option value="Nam">Nam</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="ageChildren{{$i}}">Độ Tuổi </label>
            <input id="ageChildren{{$i}}" style="font-size: 20;"
                        type="text" class="form-control" value="Trẻ Em" name="Children{{$i}}[]" readonly>
        </div>
        <div class="form-group col-md-3">
            <label>Ngày Sinh (<span style="color: red;">*</span>)</label>
            <input required id="dateCheckoutChildren{{$i}}" onblur="departureDay(this.id, this.value)" tourTime="{{$idTour->Tour_Time}}" departureDay="{{$idTour->Departure_Day}}" type="date" name="Children{{$i}}[]"
                placeholder="Nhập Ngày Khởi Hành" value="" />
        </div>
        <div class="form-group col-md-3">
            <label for="singleRoomChildren{{$i}}">Phòng Đơn:</label>
                <select onchange="singleRoom(this.value, {{$i}}, {{$idTour->Price * (75/100)}}, this.id)" class="form-control" name="Children{{$i}}[]" id="singleRoomChildren{{$i}}">
                <option selected value="Không">Không</option>
                <option value="Có">Có</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            
                <label>Giá Tiền:</label>
                            <input id="priceChildren{{$i}}" style="text-align: center; font-size: 20; color: red;" class="form-control" name="Children{{$i}}[]"
                                 maxprice="{{$idTour->Price + 1000000}}" value="{{$idTour->Price * (75/100)}}" readonly />
        </div>
    </div>

    <div class="col-md-12" style="height: 50px;"></div>
@endfor



@endif
