

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

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Đăng Ký</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="" method="POST" id="form-register">
                    
                    @csrf
                    
                    <div class="form-group" style="text-align: left">
                        <label for="email">Họ Tên:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                        <span class="error-form"></span>
                    </div>
                    <div class="form-group" style="text-align: left">
                        <label for="email">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                        <span class="error-form"></span>
                    </div>
                    <div class="form-group" style="text-align: left">
                        <label for="pwd">Mật Khẩu:</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd">
                        <span class="error-form"></span>
                    </div>
                    <button type="submit" class="btn btn-primary js-btn-login">Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- end Page Content -->
@endsection


