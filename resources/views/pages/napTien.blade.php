

<html>
  <head>
  <title>Tinsoft E-Wallet</title>
  <link rel="shortcut icon" type="image/png" href="img/icon2.png"/>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <base href="{{asset('')}}">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon -->
        {{-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="css/fontawesome-stars.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="css/meanmenu.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="css/slick.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="css/venobox.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="css/nice-select.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="css/helper.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css">
         --}}
        
        <!-- Modernizr js -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        {{-- ajax check thanh toan --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 


    <!-- jQuery-V1.12.4 -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/vendor/popper.min.js"></script>
    <!-- Bootstrap V4.1.3 Fremwork js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Ajax Mail js -->
    <script src="js/ajax-mail.js"></script>
    <!-- Meanmenu js -->
    <script src="js/jquery.meanmenu.min.js"></script>
    <!-- Wow.min js -->
    <script src="js/wow.min.js"></script>
    <!-- Slick Carousel js -->
    <script src="js/slick.min.js"></script>
    <!-- Owl Carousel-2 js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Magnific popup js -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope js -->
    <script src="js/isotope.pkgd.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <!-- Mixitup js -->
    <script src="js/jquery.mixitup.min.js"></script>
    <!-- Countdown -->
    <script src="js/jquery.countdown.min.js"></script>
    <!-- Counterup -->
    <script src="js/jquery.counterup.min.js"></script>
    <!-- Waypoints -->
    <script src="js/waypoints.min.js"></script>
    <!-- Barrating -->
    <script src="js/jquery.barrating.min.js"></script>
    <!-- Jquery-ui -->
    <script src="js/jquery-ui.min.js"></script>
    <!-- Venobox -->
    <script src="js/venobox.min.js"></script>
    <!-- Nice Select js -->
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- ScrollUp js -->
    <script src="js/scrollUp.min.js"></script>
    <!-- Main/Activator js -->
    <script src="js/main.js"></script>
    <!-- All js -->
    <script src="js/all.js"></script>


    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js
    "></script>

    {{-- <script src="js/js5.js" type="text/javascript" async></script> --}}

  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.2; user-scalable=0;">
  
  <style>
  .register{
      background: -webkit-linear-gradient(left,#260080, black);
      margin-top: 3%;
      padding: 3%;
  }
  .register-left{
      text-align: center;
      color: #fff;
      margin-top: 4%;
  }
  .register-left input{
      border: none;
      border-radius: 1.5rem;
      padding: 2%;
      width: 60%;
      background: #f8f9fa;
      font-weight: bold;
      color: #383d41;
      margin-top: 30%;
      margin-bottom: 3%;
      cursor: pointer;
  }
  .register-right{
      background: #f8f9fa;
      border-top-left-radius: 10% 50%;
      border-bottom-left-radius: 10% 50%;
  }
  .register-left img{
      margin-top: 15%;
      margin-bottom: 5%;
      width: 25%;
      -webkit-animation: mover 2s infinite  alternate;
      animation: mover 1s infinite  alternate;
  }
  @-webkit-keyframes mover {
      0% { transform: translateY(0); }
      100% { transform: translateY(-20px); }
  }
  @keyframes mover {
      0% { transform: translateY(0); }
      100% { transform: translateY(-20px); }
  }
  .register-left p{
      font-weight: lighter;
      padding: 12%;
      margin-top: -9%;
  }
  .register .register-form{
      padding: 10%;
      margin-top: 10%;
  }
  .btnRegister{
      float: right;
      margin-top: 10%;
      border: none;
      border-radius: 1.5rem;
      padding: 2%;
      background: #8ebf42;
      color: #fff;
      font-weight: 600;
      width: 50%;
      cursor: pointer;
  }
  .register .nav-tabs{
      margin-top: 3%;
      border: none;
      background: #8ebf42;
      border-radius: 1.5rem;
      width: 200px;
      float: right;
  }
  .register .nav-tabs .nav-link{
      padding: 2%;
      height: 34px;
      font-weight: 600;
      color: #fff;
      border-top-right-radius: 1.5rem;
      border-bottom-right-radius: 1.5rem;
  }
  .register .nav-tabs .nav-link:hover{
      border: none;
  }
  .register .nav-tabs .nav-link.active{
      width: 100px;
      color: #8ebf42;
      border: 2px solid #8ebf42;
      border-top-left-radius: 1.5rem;
      border-bottom-left-radius: 1.5rem;
  }
  .register-heading{
      text-align: center;
      margin-top: 8%;
      margin-bottom: -15%;
      color: #495057;
  }
  .text-label{
    padding:3px;
    font-size:18px;
    color:brown;
  }
  .text-value{
    padding:3px;
    font-size:18px;
    color:green;
  }
  </style>
  
  <script>
  $( document ).ready(function() {
    var hash = window.location.hash;
    
    
    if(hash=="#pay"){
      switchTab(2);
    }else{
      switchTab(1);
    }
    
    $( "#home-tab" ).click(function() {
      switchTab(1);
      
    });
      $( "#profile-tab" ).click(function() {
      switchTab(2);
      
    });
    
    var wallet_key= $("#wallet_key").val();
    // updateBalance(wallet_key);
    updateHistory(wallet_key); 
    $( "#wallet_key" ).change(function() {
    wallet_key= $("#wallet_key").val();
    // updateBalance(wallet_key);
    });
    
    // setInterval(function(){ 
    //   wallet_key= $("#wallet_key").val();
    //   updateHistory(wallet_key); 
    // }, 10000);
    
    
  });
  function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
  }
  function switchTab(tab){
    if(tab==1){
      $("#home-tab").attr("class","nav-link active");
      $("#profile-tab").attr("class","nav-link");
      $("#profile").hide();
      $("#home").show();
    }else{
      $("#home-tab").attr("class","nav-link");
      $("#profile-tab").attr("class","nav-link active");
      $("#home").hide();
      $("#profile").show();
      
    }
    
  }  
  // function updateBalance(wallet_key){
    
  //     var url = "/check_key.php?wallet_key="+wallet_key;
  //     $.get( url, function( data ) {
  //       var result = data;
  //       if(result.includes("OK")){
  //         $("#error").html("");
  //         var dataArr = result.split("|");
  //         $("#balance").html(formatNumber(dataArr[1])) ;
  //         $("#paid").html(formatNumber(dataArr[2])) ;
  //         $("#memo_vcb").html((dataArr[3])) ;
  //         $("#memo_momo").html((dataArr[3])) ;
  //         $("#memo_acb").html((dataArr[3])) ;
  //         $("#key_hidden").val(wallet_key);
  //         $("#redeem").show();
  //       }
  //       else if(result.includes("error")){
  //         var errorArr = result.split("|");
  //         $("#error").html(errorArr[1]);
  //         $("#balance").html("0") ;
  //         $("#paid").html("0") ;
  //         $("#memo_vcb").html("Chưa nhập mã ví!") ;
  //         $("#memo_momo").html("Chưa nhập mã ví!") ;
  //         $("#memo_acb").html("Chưa nhập mã ví!") ;
  //         $("#key_hidden").val("");
  //         $("#redeem").hide();
  //       }
  //     });
    
    
  // }                  
  function updateHistory(wallet_key){
    var url = "/check_history.php?wallet_key="+wallet_key;
      $.get( url, function( data ) {
        var result = data;
        $("#history").html(result);
        
      });
    
  }
  function copyMemo(id_copy){
    var el = document.getElementById(id_copy);
     var range = document.createRange();
     range.selectNodeContents(el);
     var sel = window.getSelection();
     sel.removeAllRanges();
     sel.addRange(range);
     document.execCommand('copy');
  }

  function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the text: " + copyText.value);
}

  </script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
  <script src="admin_asset/js/jquery-3.5.0.min.js"></script>
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>
    

   
  {{-- </script> --}}
      
      <script src="js/js5.js" type="text/javascript" async></script>
  
  <!------ Include the above in your HEAD tag ---------->
  </head>
  <body>
    @if(Auth::check())
  <div class="container register">
    <a href="home">
      <img src="image/menu/logo/travel.jpg" alt="">
  </a>
                  <div class="row">
                      <div class="col-md-3 register-left">
                          <img src="https://payment.tinsoftproxy.com/img/icon2.png" alt=""/>
                          <h3>TINSOFT</h3>
              <h3>E-WALLET</h3>
                          <p>Cổng thanh toán tự động!</p>
                      </div>
                      <div class="col-md-9 register-right">
               <div class="row">
              
                 <div class="col-md-4 register-right">
                  <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab"  href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin ví</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#pay"  role="tab" aria-controls="profile" aria-selected="false">Nạp tiền</a>
                    </li>
                  </ul>
                </div>
                <div style="width:100%;text-align:center; color:red; padding-top:8px" id="error" ></div>
              </div>
                          <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  <h3 class="register-heading">Quản lý ví tiền của bạn</h3>
                  
                                  <div class="row register-form" style="text-align:center;">
                  <div class="col-md-6">
                     <div class="card">
                      <div class="card-body">
                      <h5 class="card-title"><img src="https://payment.tinsoftproxy.com/img/w_balance.png"/>Số dư 
                        
                      </h5>
                      
                      <p class="card-text"><a id="balance" style="font-weight:bold;font-size:34px;color:green" >
                        @if(Auth::check())
                        {{number_format(Auth::user()->balance)}}
                      @else
                        0
                      @endif
                      </a> (đ)</p>
                      
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card">
                      <div class="card-body">
                      <h5 class="card-title"><img src="https://payment.tinsoftproxy.com/img/w_paid.png"/>Tổng đã nạp</h5>
                      <p class="card-text"><a id="paid" style="font-weight:bold;font-size:34px;color:#045743;" >{{number_format($sumAmount)}}</a> (đ)</p>
                      </div>
                    </div>
                  </div>
                  
                                     
                                  </div>
                  <div id="history" style="padding-left:50px;"></div>
                  
                              </div>
                             
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              
                                  <h3  class="register-heading">Nạp tiền vào ví</h3>
                    <div class="row register-form">
                       <div class="col-md-12">
                       <div class="card">
                        <img class="card-img-top" src="https://static.wixstatic.com/media/750ad6_387f19fdc31f4060a44751a46dce24ee~mv2.jpg/v1/fill/w_740,h_493,al_c,q_90,usm_0.66_1.00_0.01/750ad6_387f19fdc31f4060a44751a46dce24ee~mv2.webp" >
                        <div class="card-body" style="font-size:15px">
                        <p>Vui lòng chuyển khoản:</p>
                        <p><img data-v-4e0b9337="" src="image/QRMOMO.png" alt="" class="img"></p>
                        <li>SĐT MOMO: <b>0356 094 694</b></li>
                        <li>Người nhận: <b>TRAN CONG PHUONG</b></li>
                        <li>Nội dung(Memo):</li>
                        @if(Auth::check())
                        <input type="text" value="NAPTIEN {{Auth::user()->email}}" id="myInput" disabled style="width: 100%"> 
                        @else
                        <input type="text" value="NAPTIEN <email đăng nhập>" id="myInput" disabled>
                        @endif
                        <p><center><button name="code_submit" onclick="myFunction()" type="submit" class="btn btn-success">Copy</button></center></p>
                        </div>
                       </div>
                      </div>

                    
                      <div>
                      <p style="color:red; padding-top:20px;"><b>Lưu ý:</b></p>
                      </div>
                      <div>
                        <li>Điền chính xác mã ví trước khi thực hiện chuyển tiền.</li>
                        <li>Điền chính xác nội dung chuyển tiền để thực hiện nạp tiền tự động.</li>
                        <li>Bạn có thể nạp nhiều lần với 1 memo, tài khoản sẽ được cộng dồn. Mỗi ví chỉ có 1 memo nạp tiền duy nhất.</li>
                       
                        <li>Giao dịch thường sẽ lên tiền sau 30s-10 phút, tuy nhiên đôi lúc do một vài lỗi bên nhận tiền có thể sẽ chậm hơn một chút.</li>
                        <li>Nếu quá lâu không thấy cập nhật số dư, <a target="_blank" href="https://www.facebook.com/LeNam1903">Vui lòng liên hệ hỗ trợ!</a></li>
                      </div> 
                    </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  
                  <?php $i=1; ?>
<div style="padding-top: 50px">
    <table class="table" style="text-align: center; color:white;">
        
            <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Người nạp (SDT)</th>
                <th scope="col">ID_naptien</th>
                <th scope="col">Số tiền nạp</th>
                <th scope="col">Thời gian nạp</th>
            </tr>
            </thead>
      
        <tbody>
            @foreach($lich_su_nap_tien as $l)
                @if(Auth::user()->id == $l->id_users)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$l->numberphone}}</td>
                    <td>{{$l->ID_naptien}}</td>
                    <td style="color:green;">+{{$l->amount}}</td>
                    <td>{{$l->created_at}}</td>
                </tr>
                @else 
                    
                @endif
          @endforeach
        </tbody>
      </table>
</div>
    
  
              </div>
  @else 
              <h1>vui lòng đăng nhập trước</h1>
  @endif
  </body>
  </html>

