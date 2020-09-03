@if(Session::has("Cart") != null)
@for($i=2 ; $i <= $adult; $i++)


    {{ csrf_field() }}

    <div class="col-md-12" style="height: 50px;"></div>
    <div class="col-md-12" style="height: 50px; font-size: 20;"><b>Khách Hàng (Người Lớn {{$i}})</b></div>
    <div class="form-row">

        <div class="col-md-9">
            <label for="fullNameAdult{{$i}}">Họ Tên: (<span style="color: red;">*</span>)
            </label>
            <input required id="fullNameAdult{{$i}}" style="font-size: 20;" type="text" maxlength="50" class="form-control"
                placeholder="Nhập Họ và Tên" name="Adult{{$i}}[]">
                <span class="error-form"></span>
        </div>
        <div class="form-group col-md-3">
            <label for="genderAdult{{$i}}">Giới Tính:</label>
            <select class="form-control" name="Adult{{$i}}[]" id="genderAdult{{$i}}">
                <option selected value="Nữ">Nữ</option>
                <option value="Nam">Nam</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="ageAdult{{$i}}">Độ Tuổi</label>
            <input id="ageAdult{{$i}}" style="font-size: 20;"
                        type="text" class="form-control" value="Người Lớn" readonly name="Adult{{$i}}[]">
        </div>
        <div class="form-group col-md-3">
            <label>Ngày Sinh (<span style="color: red;">*</span>)</label>
            <input required id="dateCheckoutAdult{{$i}}" onblur="departureDay(this.id, this.value)" type="date" name="Adult{{$i}}[]"
                placeholder="Nhập Ngày Khởi Hành" tourTime="{{$idTour->Tour_Time}}" departureDay="{{$idTour->Departure_Day}}" value="" />
        </div>
        <div class="form-group col-md-3">
            <label for="singleRoomAdult{{$i}}">Phòng Đơn:</label>
                <select onchange="singleRoom(this.value, {{$i}}, {{$idTour->Price}}, this.id)" class="form-control" name="Adult{{$i}}[]" id="singleRoomAdult{{$i}}">
                <option selected value="Không">Không</option>
                <option value="Có">Có</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>Giá Tiền:</label>
                            <input style="text-align: center; font-size: 20; color: red;" class="form-control" name="Adult{{$i}}[]"
                                id="priceAdult{{$i}}" maxprice="{{$idTour->Price + 1000000}}" value="{{$idTour->Price}}" readonly />

                                
        </div>
    </div>

    <div class="col-md-12" style="height: 50px;"></div>
@endfor
@endif
