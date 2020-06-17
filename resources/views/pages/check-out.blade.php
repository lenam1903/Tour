@if(Session::has("Cart") != null)

<div class="col-md-9">

  <div id="change-list-cart">
    <div class="container">
      <h2> Mã Tour: {{$email}}</h2>
      <p>
      <h3>Quá Trình Thanh Toán: 2 Thanh Toán</h3>
      </p>
      <div class="progress" style="height: 10rem;">
        
        <div class="progress-bar bg-light" style="width:33%;color: black; ">1.Nhập Thông Tin</div>
        <div class="progress-bar bg-success progress-bar-striped" style="width:33%; ">2.Thanh Toán  </div>
        <div class="progress-bar bg-light" style="width:34%; color: black; ">3.Xác Nhận </div>
      </div>
    </div>
    <div class="panel-body"
      style="background-image: url(image/background1.jpg); background-repeat: no-repeat; position: relative;background-size: cover;">
      <!-- item -->
      <!-- end item -->
    </div>

  </div>
</div>

<div class="col-md-3" style="background-color: aquamarine;">

</div>
@endif


