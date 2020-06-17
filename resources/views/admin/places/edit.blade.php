@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa Địa Điểm
                    <small>{{$places1->Name_Places}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
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
                
                <form action="admin/places/edit/{{$places1->ID}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="directory">
                            @foreach($directory as $d)
                            <option
                                @if( $places1->ID_Directory == $d->ID)
                                    {{"selected"}}
                                @endif
                                value="{{$d->ID}}">{{$d->Directory}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên Địa Điểm</label>
                        <input class="form-control" name="places" placeholder="Nhập Tên Địa Điểm" value="{{$places1->Name_Places}}" />
                    </div>
                   
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm Mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection