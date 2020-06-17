@if(Session::has("Cart") != null)

<div class="col-md-9">


  <div class="container">
    <h2> Mã Tour: {{$idTour->Tour_Code}}</h2>
    <p>
    <h3>Quá Trình Thanh Toán: 1 Nhập Thông Tin</h3>
    </p>
    <div
      style="width: 100%; font-size: 25;text-align: center; height: 50px; text-align: center; float: left; margin: auto; margin-bottom: 100px;">
      <div
        style="width:33%;height: 50px;  background-color: chartreuse; font-size: 25;text-align: center; float: left;">
        1.Nhập Thông Tin </div>
      <div style="width:33%;height: 50px; color: black;   float: left; background-color: gray;">2.Thanh Toán</div>
      <div style="width:34%;height: 50px; color: black;  float: left; background-color: gray;">3.Xác Nhận </div>
    </div>
  </div>
  <div class="panel-body"
    style="background-image: url(image/background1.jpg); background-repeat: no-repeat; position: relative;background-size: cover;">
    <!-- item -->
    <div>
      <div id="change-list-cart">
        <table class="table" style="text-align: center;">
          <thead class="thead-dark">
            <tr>
              <th style="text-align: center;" scope="col">Người lớn (Từ 12 tuổi trở lên)</th>
              <th style="text-align: center;" scope="col">Trẻ em (Từ 5 tuổi đến dưới 12 tuổi)</th>
              <th style="text-align: center;" scope="col">Em bé (Dưới 5 tuổi)</th>
              <th style="text-align: center;" scope="col">Phòng Đơn</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$idTour->Price }}</td>
              <td>{{$idTour->Price * (75/100)}}</td>
              <td>{{$idTour->Price * (50/100)}}</td>
              <td>{{$idTour->Price * (0)}}</td>
              <td>1.000.000đ</td>

            </tr>
          </tbody>
        </table>
        <form style="font-size: 20;" action="" method="POST">
          {{ csrf_field() }}

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="em">Email (<span style="color: red;">*</span>)</label>
              <input style="font-size: 20;" type="email" class="form-control" name="email" maxlength="50" id="em"
                placeholder="Nhập Email">
            </div>
            <div class="form-group col-md-6">
              <label for="fullName">Họ Tên (<span style="color: red;">*</span>)
              </label>
              <input id="fullName" style="font-size: 20;" type="text" maxlength="50" class="form-control"
                placeholder="Nhập Họ và Tên">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="numberPhone">Số Điện Thoại (<span style="color: red;">*</span>)</label>
              <input id="numberPhone" class="form-control" placeholder="Nhập SĐT" style="font-size: 20;" type="number"
                oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                onKeyDown="if(this.value.length==13 && event.keyCode!=8) return false;">
            </div>
            <div class="form-group col-md-6">
              <label for="address">Địa Chỉ</label>
              <input id="address" style="font-size: 20;" type="text" class="form-control" placeholder="Nhập Địa Chỉ">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="note">Ghi Chú</label>
              <textarea placeholder="Nhập Địa Chỉ" style="font-size: 20;" maxlength="100" class="form-control" cols="20"
                id="note" name="note" rows="4"></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="adult">Người Lớn</label>
                  <input class="form-control" onblur="adultCheck()"
                    onclick="javascript:show_text('Từ 12 tuổi trở lên',this)" id="adult" value="0" max="99" min="0"
                    style="font-size: 20;" type="number"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                    onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;">
                </div>
                <div class="form-group col-md-2">
                  <label for="children">Trẻ Em</label>
                  <input class="form-control" onblur="childrenCheck()"
                    onclick="javascript:show_text('Từ 5 tuổi đến dưới 12 tuổi',this)" id="children" value="0" max="99"
                    min="0" style="font-size: 20;" type="number"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                    onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;">
                </div>
                <div class="form-group col-md-2">
                  <label for="baby">Em Bé</label>
                  <input class="form-control" onblur="babyCheck()" onclick="javascript:show_text('Dưới 5 tuổi',this)"
                    id="baby" value="0" max="99" min="0" style="font-size: 20;" type="number"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                    onKeyDown="if(this.value.length==2 && event.keyCode!=8) return false;">
                </div>

                <div class="form-group col-md-3">
                  <label for="guestNumber">Số Khách</label>
                  <input id="guestNumber" guestNumberMax="{{$idTour->Number_Of_Seats_Available}}" style="font-size: 20;"
                    type="number" class="form-control" value="0" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group col-md-12">
            <button id="btnCheckoutInfo" onclick="postCheckOutInfo({{$idTour->ID}})"
              style="text-align: center; color: chartreuse; font-size: 20;" type="button" class="btn btn-primary">Đặt
              Tour</button>
          </div>
        </form>


        <div class="form-group col-md-12">
          <form style="font-size: 20;" action="" method="POST">
            {{ csrf_field() }}

            <div class="form-row">
              
              <div class="form-group col-md-9">
                <label for="fullNameG">Họ Tên: (<span style="color: red;">*</span>)
                </label>
                <input id="fullNameG" style="font-size: 20;" type="text" maxlength="50" class="form-control"
                  placeholder="Nhập Họ và Tên">
              </div>
              <div class="form-group col-md-3">
                <label for="gender">Giới Tính:</label>
                <select class="form-control" name="gender" id="gender">
                      <option selected value="0">Nữ</option>
                      <option value="1">Nam</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="numberPhone">Độ Tuổi (<span style="color: red;">*</span>)</label>
                <input id="numberPhone" class="form-control" placeholder="Nhập SĐT" style="font-size: 20;" type="number"
                  oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                  onKeyDown="if(this.value.length==13 && event.keyCode!=8) return false;">
              </div>
              <div class="form-group">
                <label>{{$idTour->Departure_Day}}</label>
                <input id="dateCheckout" onblur="dateCheckoutInfo()" type="date" name="departure_day"
                  placeholder="Nhập Ngày Khởi Hành" />
              </div>
              <div class="form-group col-md-3">
                <label for="singleRoom">Phòng Đơn:</label>
                <select class="form-control" name="singleRoom" id="singleRoom">
                      <option selected value="0">Không</option>
                      <option value="1">Có</option>
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- end item -->
    </div>

  </div>
</div>


<div class="col-md-3">
  <div style="width: 100%; height: 100%; background-color: blue;">
    <div class="form-group">
      <label>{{$idTour->Departure_Day}}</label>
      
    </div>
  </div>
</div>

@endif

<script>
  function dateCheckoutInfo() {

let id = $("#dateCheckout");

let inputDate = $(id).val();
let date = new Date('{{$idTour->Departure_Day}}');
let tt =  date.getFullYear();
console.log(tt);
}
</script>