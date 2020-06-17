@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Tour</h1>
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
                
                <form action="admin/tour/add" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <label>Mã Tour</label>
                        <input class="form-control" name="tour_code" placeholder="Nhập Tên Địa Điểm" />
                    </div>
                    <div class="form-group">
                        <label>Tên Tag</label>
                        <select class="form-control" name="idtag" id="Tag">
                            @foreach($tag as $t)
                                <option value="{{$t->ID}}">{{$t->Tag}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="iddirectory" id="Directory">
                            @foreach($directory as $d)
                                <option
                                @if($directory1->ID == $d->ID)
                                    {{"selected"}}
                                @endif
                                 value="{{$d->ID}}">{{$d->Directory}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên Địa Điểm </label>
                        <select class="form-control" name="idplaces" id="Places">
                            @foreach($places as $p)
                                @if($directory1->ID == $p->ID_Directory)
                                    <option selected value="{{$p->ID}}"                               
                                    >{{$p->Name_Places}}
                                </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tên Tour</label>
                        <input class="form-control" name="tour" placeholder="Nhập Tên Tour" />
                    </div>
                    <div class="form-group">
                        <br><label>Thời Gian Tham Quan</label><br>
                        <label style="margin: 10px 10px 10px 50px;" >Chọn Ngày</label>
                        <label style="margin-right: 100px;">
                            <select id="mySelect1" class="form-control" name="tour_time[]" style="width: 50">
                                @for ($i=0; $i < 31; $i++) { 
                                    echo "<option value="{{$i.' Ngày'}}"> {{$i}} </option>";
                                @endfor
                            </select>
                        </label>

                        <label>Chọn Đêm</label>
                        <label>
                            <select id="mySelect1" class="form-control" name="tour_time[]" style="width: 50">
                                @for ($i=0; $i < 31; $i++) { 
                                    echo "<option value="{{$i.' Đêm'}}"> {{$i}} </option>";
                                @endfor
                            </select>
                        </label>
                    </div>
                   

                    <div class="form-group">
                        <label>Nơi Khởi Hành</label>
                        <input class="form-control" name="place_of_departure" placeholder="Nhập Nơi Khởi Hành" />
                    </div>
                    <div class="custom-control custom-checkbox">
                        <label>Phương Tiện Vận Chuyển</label><p>
                        <input type="checkbox" id="c1" name="transportation[]" value="bicycle" />
                        <label for="c1"><span></span>Xe Đạp</label>
                        <input type="checkbox" id="c2" name="transportation[]" value="motorbike" />
                        <label for="c2"><span></span>Xe Máy</label>
                        <input type="checkbox" id="c3" name="transportation[]" value="car" />
                        <label for="c3"><span></span>Ô Tô</label>
                        <input type="checkbox" id="c4" name="transportation[]" value="planes" />
                        <label for="c4"><span></span>Máy Bay</label>
                    </div>  
                    <div class="form-group">
                        <label>Ngày Khởi Hành</label>
                        <input class="date form-control" type="text" name="departure_day" placeholder="Nhập Ngày Khởi Hành" />
                    </div>
                    <div class="form-group">
                        <label>Miêu Tả</label>
                        <textarea class="form-control  ckeditor" rows="5" id="demo" name="describe"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <p id="img1">
                        
                        </p>
                        <input type="file" name="image" id="img">
                    </div>
                    <div class="form-group">
                        <label>Số Chỗ Còn Trống</label>
                        <input class="form-control" name="number_of_seats_available" placeholder="Nhập Số Chỗ Còn Trống" />
                    </div>
                    <div class="form-group">
                        <label>Giá Tiền</label>
                        <input class="form-control" name="price" placeholder="Nhập Giá Tiền" />
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm Mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<script type="text/javascript">
    $('.date').datepicker({
       format: 'yyyy-mm-dd'
     });
</script>

@endsection

@section('script')

    <script>
        $(document).ready(function(){
            $("#Directory").change(function(){
                var iddirectory = $(this).val();
                $.get("admin/ajax/tour/"+iddirectory,function(data){
                    $("#Places").html(data);
                });
            });        
        });

        $(document).ready(function(){
            $("#Directory").change(function(){
                var id = $(this).val();
                $.get("admin/ajax/tour/directory/"+id,function(data){
                    $("#Directory").html(data);
                });
            });        
        });

        $(document).ready(function(){
            $("#img").change(function(){
                var id = $(this).val();
                var img =(id.substr(12, id.length-11));
                alert(img);
                $.get("admin/ajax/tour/img/"+img,function(data){
                    $("#img1").html(data);
                });
            });        
        });
    </script>

@endsection