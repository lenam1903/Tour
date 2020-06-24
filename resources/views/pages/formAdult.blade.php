@if(Session::has("Cart") != null)
@for($i=2 ; $i <= $adult; $i++)


    {{ csrf_field() }}

    <div class="col-md-12" style="height: 50px;"></div>
    <div class="col-md-12" style="height: 50px; font-size: 20;"><b>Khách Hàng (Người Lớn {{$i}})</b></div>
    <div class="form-row">

        <div class="form-group col-md-9">
            <label for="fullNameAdult{{$i}}">Họ Tên: (<span style="color: red;">*</span>)
            </label>
            <input id="fullNameAdult{{$i}}" style="font-size: 20;" type="text" maxlength="50" class="form-control"
                placeholder="Nhập Họ và Tên">
        </div>
        <div class="form-group col-md-3">
            <label for="genderAdult{{$i}}">Giới Tính:</label>
            <select class="form-control" name="genderAdult{{$i}}" id="genderAdult{{$i}}">
                <option selected value="0">Nữ</option>
                <option value="1">Nam</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="ageAdult{{$i}}">Độ Tuổi</label>
            <input id="ageAdult{{$i}}" style="font-size: 20;"
                        type="text" class="form-control" value="Người Lớn" readonly>
        </div>
        <div class="form-group col-md-3">
            <label>Ngày Sinh</label>
            <input id="dateCheckoutAdult{{$i}}" onblur="dateCheckoutInfo(this.id, this.value)" type="date" name="dateCheckoutAdult{{$i}}"
                placeholder="Nhập Ngày Khởi Hành" />
        </div>
        <div class="form-group col-md-3">
            <label for="singleRoomAdult{{$i}}">Phòng Đơn:</label>
                <select onchange="singleRoom(this.value, {{$i}}, {{$idTour->Price}}, this.id)" class="form-control" name="singleRoomAdult{{$i}}" id="singleRoomAdult{{$i}}">
                <option selected value="0">Không</option>
                <option value="1">Có</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            Giá Tiền:<label style="text-align: center; font-size: 20; color: red;" id="priceAdult{{$i}}"
                maxprice="{{$idTour->Price + 1000000}}" for="priceAdult{{$i}}">{{$idTour->Price}}</label>
        </div>
    </div>

    <div class="col-md-12" style="height: 50px;"></div>
@endfor
@endif
