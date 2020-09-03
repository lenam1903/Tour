@if(Session::has("Cart") != null)

@for($i=1 ; $i <= $baby; $i++)

<div class="col-md-12" style="height: 50px;"></div>
<div class="col-md-12" style="height: 50px; font-size: 20;"><b>Khách Hàng (Em Bé {{$i}})</b></div>

    {{ csrf_field() }}

    <div class="form-row">

        <div class="col-md-9">
            <label for="fullNameBaby{{$i}}">Họ Tên: (<span style="color: red;">*</span>)
            </label>
            <input name="Baby{{$i}}[]" required id="fullNameBaby{{$i}}" style="font-size: 20;" type="text" maxlength="50" class="form-control"
                placeholder="Nhập Họ và Tên">
                <span class="error-form"></span>
        </div>
        <div class="form-group col-md-3">
            <label for="genderBaby{{$i}}">Giới Tính:</label>
            <select name="Baby{{$i}}[]" class="form-control" id="genderBaby{{$i}}">
                <option selected value="Nữ">Nữ</option>
                <option value="Nam">Nam</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="ageBaby{{$i}}">Độ Tuổi </label>
            <input id="ageBaby{{$i}}" style="font-size: 20;"
                        type="text" class="form-control" value="Em Bé" name="Baby{{$i}}[]" readonly>
        </div>
        <div class="form-group col-md-3">
            <label>Ngày Sinh (<span style="color: red;">*</span>)</label>
            <input required id="dateCheckoutBaby{{$i}}" onblur="departureDay(this.id, this.value)" tourTime="{{$idTour->Tour_Time}}" type="date" name="Baby{{$i}}[]"
                placeholder="Nhập Ngày Khởi Hành" />
        </div>
        <div class="form-group col-md-3">
            <label for="singleRoomBaby{{$i}}">Phòng Đơn:</label>
                <select onchange="singleRoom(this.value, {{$i}}, {{$idTour->Price * (50/100)}}, this.id)" class="form-control" name="Baby{{$i}}[]" id="singleRoomBaby{{$i}}">
                <option selected value="Không">Không</option>
                <option value="Có">Có</option>
            </select>
        </div>
        <div class="form-group col-md-3">
           
                <label>Giá Tiền:</label>
                            <input id="priceBaby{{$i}}" style="text-align: center; font-size: 20; color: red;" class="form-control" name="Baby{{$i}}[]"
                                 maxprice="{{$idTour->Price + 1000000}}" value="{{$idTour->Price * (50/100)}}" readonly />
        </div>
    </div>

    <div class="col-md-12" style="height: 50px;"></div>
@endfor



@endif
