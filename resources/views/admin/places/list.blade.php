@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Địa Điểm
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
            <table  class="table table-striped table-bordered table-hover" id="dataTables-example" style="width: 87%;">
                <thead  class="thead-dark">
                    <tr align="center">
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">ID_Danh Mục</th>
                        <th style="text-align: center;">Địa Điểm</th>
                        <th style="text-align: center;">Địa Điểm URL</th>
                        <th style="text-align: center;">Thời Gian Tạo</th>
                        <th style="text-align: center;">Thời Gian Cập Nhật</th>
                        <th style="text-align: center;">Xóa</th>
                        <th style="text-align: center;">Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($places as $p)
                        <tr class="odd gradeX" align="center">
                            <td>{{$p->ID}}</td>
                            <td>{{$p->directory->Directory}}</td>
                            <td>{{$p->Name_Places}}</td>
                            <td>{{$p->Name_Places_URL}}</td>
                            <td>{{$p->created_at}}</td>
                            <td>{{$p->updated_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/places/delete/{{$p->ID}}">Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/places/edit/{{$p->ID}}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


@endsection