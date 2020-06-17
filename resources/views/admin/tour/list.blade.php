@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper" style="width: 87%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tour
                    <small>Danh Sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                
                @if(session('notification'))
                    <div class="alert alert-success">
                        {{session('notification')}}
                    </div>
                @endif
            <div >
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width: 200%">
                <thead  class="thead-dark">
                    <tr align="center">
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Mã Tour</th>
                        <th style="text-align: center;">Tag</th>
                        <th style="text-align: center;">Danh Mục</th>
                        <th style="text-align: center;">Tên Địa Điểm</th>
                        <th style="text-align: center;">Tên Tour</th>
                        <th style="text-align: center;">Tên Tour URL</th>
                        <th style="text-align: center;">Thời Gian Tham Quan</th>
                        <th style="text-align: center;">Nơi Khởi Hành</th>
                        <th style="text-align: center;">Vận chuyển</th>
                        <th style="text-align: center;">Ngày Khởi Hành</th>
                        <th style="text-align: center;">Miêu Tả</th>
                        <th style="text-align: center;">Ảnh</th>
                        <th style="text-align: center;">Chỗ Còn Trống</th>
                        <th style="text-align: center;">Giá Tiền</th>
                        <th style="text-align: center;">Thời Gian Tạo</th>
                        <th style="text-align: center;">Thời Gian Cập Nhật</th>
                        <th style="text-align: center;">Xóa</th>
                        <th style="text-align: center;">Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tour as $t)
                        <tr class="odd gradeX" align="center">
                            <td>{{$t->ID}}</td>
                            <td>{{$t->Tour_Code}}</td>
                            <td>{{$t->tag->Tag}}</td>
                            <td>{{$t->directory->Directory}}</td>
                            <td>{{$t->places1->Name_Places}}</td>
                            <td>{{$t->Tour_Name}}</td>
                            <td>{{$t->Tour_Name_URL}}</td>
                            <td>{{$t->Tour_Time}}</td>
                            <td>{{$t->Place_Of_Departure}}</td>
                            <td>{{$t->Transportation}}</td>
                            <td>{{$t->Departure_Day}}</td>
                            <td>{{$t->Describe}}</td>
                            <td><img width="200px" height="200px" src="upload/tour/{{$t->Image}}"> </td>
                            <td>{{$t->Number_Of_Seats_Available}}</td>
                            <td>{{$t->Price}}</td>
                            <td>{{$t->created_at}}</td>
                            <td>{{$t->updated_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tour/delete/{{$t->ID}}">Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tour/edit/{{$t->ID}}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->



@endsection

