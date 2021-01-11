@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper" style="width: 87%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>List</small>
                </h1>
            </div>
            @if(session('notification'))
                    <div class="alert alert-success">
                        {{session('notification')}}
                    </div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="width: 200%">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Slide Name</th>
                        <th>Image</th>
                        <th>Link</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slide as $sd)
                        <tr class="odd gradeX" align="center">
                            <td>{{$sd->ID}}</td>
                            <td>{{$sd->Slide_Name}}</td>
                            <td>
                                <img max-width: 400px; height="250px" src="css/images/slider/{{$sd->Image}}">
                            </td>
                            <td>{{$sd->Link}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/delete/{{$sd->ID}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/edit/{{$sd->ID}}">Edit</a></td>
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