@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Thêm Slide
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

                @if(session('loi'))
                    <div class="alert alert-danger">
                        
                    {{session('loi')}}
                      
                    </div>
                @endif

                @if(session('notification'))
                    <div class="alert alert-success">
                        {{session('notification')}}
                    </div>
                @endif

                <form action="admin/slide/add" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="slide_name" placeholder="Nhập tên Slide" />
                    </div>
                     <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="link" placeholder="Nhập link" />
                    </div>
                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <p id="img1"> </p>
                        <input type="file" name="img" id="img">
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection


@section('script')
<script>
    $(document).ready(function(){
            $("#img").change(function(){
                var id = $(this).val();
                var img =(id.substr(12, id.length-11));
                // alert(img);
                $.get("admin/ajax/slide/img/"+img,function(data){
                    $("#img1").html(data);
                });
            });        
        });
</script>

@endsection