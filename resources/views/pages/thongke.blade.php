<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="Lê Nam">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin - Tour</title>

    <base href="{{asset('')}}">
    
    <!-- Bootstrap Core CSS -->

    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

     <!-- input date -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <!-- jQuery -->
    <script src="admin_asset/js/jquery-3.5.0.min.js"></script>
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

        
    <!-- Textarea JavaScript -->
     <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 

   

    <script src="js/js5.js" type="text/javascript" async></script>


   
   
    <!-- Google Font -->
   
    
    <style>
        #change-item-cart table tbody tr td{
            width: 70px;
        }

      
    </style>


</head>

<body>

    <div id="wrapper"  style="width: 100%;"  >
     
        @include('admin.layout.header')



 
        
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    
      
    
    
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    
    
      <!-- Page-Level Demo Scripts - Tables - Use for reference -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
    
     
    {{-- </script> --}}
    

      <script >
        $(document).ready(function(){
    chart30days();
    var chart =   new Morris.Line({
    // ID of the element in which to draw the chart.
    element: 'myfirstchart',
    lineColors: ['#819C79', '#fc8710', '#FF6541'],
    
    hideHover: 'auto',
    parseTime: 'false',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    // The name of the data record attribute that contains x-values.
    xkey: 'preiod',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['profit','quantify'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['doanh số','số lượng']
    });
    
    function chart30days()
    {
    var _token = $('input[name="_token"]').val();
    
    $.ajax({
    url: "admin/thongke/chart30days",
    type: "POST",
    dataType: "JSON",
    data: {_token:_token},
    success:function(data)
    {
      chart.setData(data);
    }
    
    })
    }
    
    $('.dasboard-filter').change(function()
    {
    var dasboard_value = $(this).val();
    var _token = $('input[name="_token"]').val();
    //alert(dasboard_value);
    
    $.ajax({
    url: "admin/thongke/dasboard-filter",
    type: "POST",
    dataType: "JSON",
    data: {dasboard_value:dasboard_value, _token:_token},
    success:function(data)
    {
      chart.setData(data);
    }
    });
    });
    
    $("#btn-dasboard-filter").click(function(){
     //alert("ok");
    
     var _token = $('input[name="_token"]').val();
     var from_date = $('#datepicker').val();
     var to_date = $('#datepicker2').val();
    
     $.ajax({
       url: "admin/thongke/filter-by-day",
       type: "POST",
       dataType: "JSON",
       data: {from_date: from_date, to_date: to_date, _token:_token},
    
       success:function(data)
       {
          chart.setData(data);
       }
     });
    }
    );
    });
        $( function() {
            $( "#datepicker" ).datepicker(
      {
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat: "yy-mm-dd",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5","Thứ 6", "Thứ 7", "Chủ nhật"],
        duration: "slow"
      }
    );
    
    $("#datepicker2").datepicker(
      {
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat: "yy-mm-dd",
        dayNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5","Thứ 6", "Thứ 7", "Chủ nhật"],
        duration: "slow"
      }
    );
        } );
        </script>



    <!-- Page Content -->
    <div id="page-wrapper" style="width: 87%;">
        <h1>Thống Kê</h1>
        <div class="row">
            <!-- chart morris start -->
          <p class="title_thongke"><center style="font-size:20px; color:red;">Thống kê doanh số</center></p>
          <form autocomplete="off">
           @csrf
           <div class="col-md-2">
           <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
           <input type="button" id="btn-dasboard-filter" class="btn btn-primary btn-sm" value="Tìm kiếm"></p>
           </div>
    
           <div class="col-md-2">
           <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
           </div>
                
          <div class="col-md-2">
          <p>
                Lọc theo: 
                <select class="dasboard-filter form-control">
                <option>>------chọn------<</option>
                <option value="7ngay">7 ngày</option>
                <option value="thangtruoc">Tháng trước</option>
                <option value="thangnay">Tháng này</option>
                <option value="365ngayqua">365 ngày qua</option>
                </select>
          </p>
          </div>
          </form>
          </div>
          <div class="col-md-12">
              <div id="myfirstchart" style="heigth: 250px;"></div>
          </div>
    
    </div>
    <!-- /#page-wrapper -->
    

    </div>

</body>
    <!-- /#wrapper -->
    
 
    
    









    <!doctype html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>jQuery UI Datepicker - Default functionality</title>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     
    </head>
    <body>
     

     
     
    </body>
    </html>





