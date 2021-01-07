@extends('layout.index')

@section('content')

@if(Auth::check())

<?php $i=1; ?>
<div style="padding-top: 50px">
    <table class="table" style="text-align: center">
        
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
                    <h1>trống</h1>
                @endif
          @endforeach
        </tbody>
      </table>
</div>
    


<!--Checkout Area End-->
@endsection

@else

<p style="font-size: 30px; color: red;">Vui lòng đăng nhập trước</p>
@endif



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
                        <input type="password" name="password" class="form-control" placeholder="Enter password"
                            id="pwd">
                        <span class="error-form"></span>
                    </div>
                    <button type="submit" class="btn btn-primary js-btn-login">Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>
</div>