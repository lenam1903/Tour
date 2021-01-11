@extends('admin.layout.index')

@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lịch Sử Nạp Tiền
                    <small>List</small>
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
                <thead class="thead-dark">
                    <?php $i = 0; ?>
                    <tr align="center">
                        <th style="text-align: center;">STT</th>
                        <th style="text-align: center;">Email Nhận Tiền</th>
                        <th style="text-align: center;">Số Điện Thoại Nạp</th>
                        <th style="text-align: center;">ID Nạp Tiền</th>
                        <th style="text-align: center;">Số Tiền Nạp</th>
                        <th style="text-align: center;">Thời Gian Tạo</th>
                        <th style="text-align: center;">Xóa</th>
                     
                    </tr>
                </thead>
                <tbody>
                    @foreach($lich_su_nap_tien as $ls)
                        <tr class="odd gradeX" align="center">
                            <td>{{$i++}}</td>
                            <td>
                                {{$ls->users->Full_Name}}
                              
                            </td>
                            <td>{{$ls->numberphone}}</td>
                            <td>{{$ls->ID_naptien}}</td>
                            <td>+{{$ls->amount}}</td>
                            <td>{{$ls->created_at}}</td>
                     
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/lich-su-nap-tien/delete/{{$ls->ID}}"> Delete</a></td>
                          
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