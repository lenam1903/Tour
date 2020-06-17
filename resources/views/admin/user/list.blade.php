@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper" style="width: 87%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tour
                    <small>List</small>
                </h1>
            </div>
            @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width: 200%">
                <thead>
                    <tr align="center">
                    <th>ID</th>
                        <th>Email</th>
                        <th>Full Name</th>
                        <th>Level</th>
                        <th>Birthday</th>
                        <th>Address</th>
                        <th>ID Card Number</th>
                        <th>Phone Number</th>
                        <th>Time Created</th>
                        <th>Time Update</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                        <tr class="odd gradeX" align="center">
                        <td>{{$u->id}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->Full_Name}}</td>
                            <td>
                                @if($u->Level == "1")
                                    {{"Admin"}}
                                @else
                                    {{"User"}}
                                @endif
                            </td>
                            <td>{{$u->Birthday}}</td>
                            <td>{{$u->Address}}</td>
                            <td>{{$u->ID_Card_Number}}</td>
                            <td>{{$u->Phone_Number}}</td>
                            <td>{{$u->created_at}}</td>
                            <td>{{$u->updated_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/delete/{{$u->id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{$u->id}}">Edit</a></td>
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