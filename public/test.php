

@extends('layout.index')



@section('content')

<!-- Page Content -->
<div class="container-fluid">

	@include('layout.slide')

	<div class="space20"></div>

	<div id="content" class="row main-left" style="background-image: url(image/background.jpg)">
		@include('layout.menu')

		<div class="col-md-9">
			<div class="panel panel-default">
			<div id="change-list-cart">
				<div class="panel-heading" style="background-color:#337AB7; color:white;">
					<h2 style="margin-top:0px; margin-bottom:0px;">Tour</h2>
				</div>
				<div class="panel-body"
					style="background-image: url(image/background1.jpg); background-repeat: no-repeat; position: relative;background-size: cover;">
					<!-- item -->
					<div class="row-item row">
						@foreach($tour as $t)
						<div class="col-md-4 border-right"
							style="float: left; width: 33.33%; padding: 1px 1px 50px 30px; text-align: center; ">
							<a href="">
								<img width="400px" height="300px" src="upload/tour/{{$t->Image}}"
									alt="{{$t->Tour_Name}}">
							</a>
							<h3>
								<a style="text-decoration: none; color:blue;" href="tour.html">{{$t->Tour_Name}}</a>
							</h3>
							<p><span class="glyphicon glyphicon-time"></span> Thời gian : {{$t->Tour_Time}}
							</p>
							<p>Địa Điểm : {{$t->places1->Name_Places}} </p>
							<p>{{number_format($t->Price)}} đ</p>
							<a onclick="AddCart({{$t->ID}})" class="btn btn-primary" href="javascript:"> Add Cart <span
									class="add-cart-large"></span></a>
						</div>
						@endforeach
					</div>
					<!-- end item -->
				</div>
			</div>
			</div>
		</div>
	</div>
	<!-- /.row -->
</div>

<div class="modal fade" id="myModal" style="z-index:10; position:relative;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-register">
                    @csrf
                    <div class="form-group" style="text-align: left">
                        <label for="email">Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                        <span class="error-form"></span>
                    </div>
                    <div class="form-group" style="text-align: left">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                        <span class="error-form"></span>
                    </div>
                    <div class="form-group" style="text-align: left">
                        <label for="pwd">Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd">
                        <span class="error-form"></span>
                    </div>
                    <button type="submit" class="btn btn-primary js-btn-login">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- end Page Content -->
@endsection

@section('script')

<script>

	$.ajaxSetup({ 
		headers: { 
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
		} 
	});

    
    function AddCart(id){

        var quantyCart = $("#quantyCart-"+id).attr("quantyCart");
        var quantyCartMax = ($("#quantyCart-"+id).attr("quantyCartMax"));
       
        $.ajax({
            url: 'Add-Cart/'+id+"/"+quantyCart,
            type: 'GET',
        }).done(function(response){
            if(quantyCart == null){
                RenderCart(response);
                alertify.success("Đã thêm sản phẩm");
                
            }
            else{
                if(Number(quantyCart) < quantyCartMax){
                    RenderCart(response);
                    alertify.success("Đã thêm sản phẩm");
                }
                else{
                    alertify.error("Đã thêm thất bại (số chỗ trống còn: "+ quantyCartMax +")");
                }
            }
        });
    }
	
    $("#change-item-cart").on("click", ".si-close i", function(){
		id = $(this).data("id");
        $.ajax({
            url: 'Delete-Item-Cart/'+id,
            type: 'POST',
			
		
        }).done(function(response){
        RenderCart(response);
        alertify.success("Đã xóa sản phẩm");
        });
        
    });

	function DeleteListItemCart(id) {
        $.ajax({
            url: 'Delete-Item-List-Cart/'+id,
            type: 'post',
        }).done(function(response){
			$("#change-list-cart").empty();
			$("#change-item-cart").empty();
            $("#change-list-cart").html(response);
            alertify.success("Đã xoá sản phẩm");
        });    
    }

	function SaveListItemCart(id) {
        
        var quantyMax = $("#saveQuanty-"+id).attr("quantyMax");
        var quanty = $("#quanty-item-"+id).val();
        $.ajax({
            url: 'Save-Item-List-Cart/'+id+'/'+$("#quanty-item-"+id).val(),
            type: 'post',
        }).done(function(response){
            
            if (quanty <= Number(quantyMax)) {
                    
                $("#change-list-cart").empty();
                $("#change-item-cart").empty();
                $("#change-list-cart").html(response);
            
                alertify.success("Đã cập nhật thành công");
            }
            else{
                alertify.error("Đã cập nhật thất bại (số chỗ trống còn: "+ quantyMax +")");
            }
        }); 
    }
	
    $(document).ready(function(){
        $(".list-cart").click(function(){
            var id = $(this).attr("listCart");
			
            $.ajax({
            url: 'List-Cart',
            type: 'GET',
            }).done(function(response){
                $("#change-list-cart").empty();
				$(".cart-icon").empty();
                $("#change-list-cart").html(response);
                alertify.success("Danh sách Cart đã xuất hiện");
            });
        });
    });

    function RenderCart(response){
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);  
        $("#total-quanty-show").text($("#total-quanty-cart").val());
                
    }

    function CheckOutInfo(id) {
        $.ajax({
            url: 'CheckOutInfo/'+id,
            type: 'get',
        }).done(function(response){
			$("#content").empty();
            $(".cart-icon").empty();
            $("#content").html(response);
            alertify.success("Vui lòng nhập thông tin thanh toán");
        });    
    }

    

    // $(document).ready(function(){
    //     $(".checkOut").click(function(){
    //         $.ajax({
    //         url: 'Check-Out',
    //         type: 'post',
    //         }).done(function(response){
    //             $("#content").empty();
    //             $(".cart-icon").empty();
    //             $("#content").html(response);
    //             alertify.success("Danh sách Cart đã xuất hiện");
    //             alertify.success("Vui lòng chọn 1 Tour để làm thủ tục thanh toán");
    //         });
    //     });
    // });
    

   


</script>

<script>
    $(function () {

    	$(".js-modal-register").click(function (event) {
			event.preventDefault();
			$("#myModal").modal('show');
		})
    
        $('.js-btn-login').click(function (e) {
			e.preventDefault();
            $(".error-form").empty();
			let $this = $(this);
			let $domForm = $this.closest('form');

			$.ajax({
				url: 'register',
				data: $domForm.serialize(),
                method : "POST",
			}).done(function (results) {
                    // ẩn modal
				$("#myModal").modal('hide');
                alert('Đăng Ký Thành Công');
                    // làm mới lại form khi đăng kí thành công
				$("#form-register")[0].reset();
			}).fail(function (data) {
				var errors = data.responseJSON;
                $(".error-form").empty();
				$.each(errors.errors, function (i, val) {
					$domForm.find('input[name=' + i + ']').siblings('.error-form').text(val[0]);
				});
			});
		});
	})
</script>



@endsection

