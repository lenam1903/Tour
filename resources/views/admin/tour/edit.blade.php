@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa Tour: {{$tour1->Tour_Code}}</h1>
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
                
                <form action="admin/tour/edit/{{$tour1->ID}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <label>Mã Tour</label>
                        <input class="form-control" name="tour_code" readonly value="{{$tour1->Tour_Code}}" />
                    </div>
                     <div class="form-group">
                        <label>Tên Tag</label>
                        <select class="form-control" name="idtag" id="Tag" >
                            @foreach($tag as $t)
                                <option 
                                value="{{$t->ID}}">{{$t->Tag}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="iddirectory" id="Directory">
                            @foreach($directory as $d)
                                <option
                                @if($d->ID == $tour1->ID_Directory)
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
                                @if($tour1->ID_Directory == $p->ID_Directory)
                                    <option
                                    @if($p->ID == $tour1->ID_Place) 
                                        {{"selected"}}
                                    @endif 
                                    value="{{$p->ID}}">{{$p->Name_Places}}
                                    </option>
                                @endif  
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tên Tour</label>
                        <input class="form-control" name="tour" placeholder="Nhập Tên Tour" value="{{$tour1->Tour_Name}}" />
                    </div>
                    <div class="form-group">
                        <br><label>Thời Gian Tham Quan</label><br>
                        <label style="margin: 10px 10px 10px 50px;" >Chọn Ngày</label>
                        <label style="margin-right: 100px;">
                            <select id="mySelect1" class="form-control" name="tour_time[]" style="width: 50">
                                <?php
                                    $tourtime = explode(' ', $tour1->Tour_Time);
                                ?>
    
                                @for ($i=0; $i < 32; $i++)
                                    <option
                                    @if($i == $tourtime[1]) 
                                        {{"selected"}}
                                    @endif 
                                    value="{{$i.' Ngày'}}"> {{$i}} </option>";
                                @endfor
                                
                            </select>
                        </label>

                        <label>Chọn Đêm</label>
                        <label>
                            <select id="mySelect1" class="form-control" name="tour_time[]" style="width: 50">
                                @for ($i=0; $i < 32; $i++) { 
                                    echo "<option
                                    @if($i == $tourtime[3]) 
                                        {{"selected"}}
                                    @endif 
                                    value="{{$i.' Đêm'}}"> {{$i}} </option>";
                                @endfor  
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Nơi Khởi Hành</label>
                        <input class="form-control" type="text" name="place_of_departure" value="{{$tour1->Place_Of_Departure}}" />
                    </div>
                    <div class="custom-control custom-checkbox">
                        <label>Phương Tiện Vận Chuyển</label><p>
                        
                            <?php
                                $transportation = $tour1->Transportation;

                                function findTransportation($transportation, $value)
                                {
                                    if(strpos($transportation,$value) !== false)
                                    {
                                        echo "checked";
                                    }
                                }
                            ?>   

                        <input type="checkbox" id="c1" name="transportation[]" value="bicycle" {{findTransportation($transportation, 'bicycle')}}/>
                        <label for="c1"><span></span>Xe Đạp</label>
                        <input type="checkbox" id="c2" name="transportation[]" value="motorbike" {{findTransportation($transportation, 'motorbike')}}/>
                        <label for="c2"><span></span>Xe Máy</label>
                        <input type="checkbox" id="c3" name="transportation[]" value="car" {{findTransportation($transportation, 'car')}}/>
                        <label for="c3"><span></span>Ô Tô</label>
                        <input type="checkbox" id="c4" name="transportation[]" value="planes" {{findTransportation($transportation, 'planes')}}/>
                        <label for="c4"><span></span>Máy Bay</label>
                    </div>  
                    <div class="form-group">
                        <label>Ngày Khởi Hành</label>
                        <input class="date form-control" type="text" name="departure_day" value="{{$tour1->Departure_Day}}" />
                    </div>
                    <div class="form-group">
                        <label>Miêu Tả</label>
                        <textarea class="form-control  ckeditor" rows="5" id="demo" name="describe">{{$tour1->Describe}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <p id="img1">
                        <img width="400px" src="upload/tour/{{$tour1->Image}}">
                        </p>
                        <input type="file" name="image" id="img">
                        
                    </div>
                    <div class="form-group">
                        <label>Số Chỗ Còn Trống</label>
                        <input class="form-control" name="number_of_seats_available" value="{{$tour1->Number_Of_Seats_Available}}" />
                    </div>
                    <div class="form-group">
                        <label>Giá Tiền</label>
                        <input class="form-control" name="price" value="{{$tour1->Price}}" />
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm Mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bình Luận
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
                        <th style="text-align: center;">Tên Người Dùng</th>
                        <th style="text-align: center;">Mã Tour</th>
                        <th style="text-align: center;">Tiêu Đề</th>
                        <th style="text-align: center;">Nội Dung</th>
                        <th style="text-align: center;">Đánh Giá</th>
                        <th style="text-align: center;">Thời Gian Tạo</th>
                        <th style="text-align: center;">Thời Gian Cập Nhật</th>
                        <th style="text-align: center;">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tour1->comment as $cm)
                        <tr class="odd gradeX" align="center">
                            <td>{{$cm->ID}}</td>
                            <td>{{$cm->users->Full_Name}}</td>
                            <td>{{$tour1->Tour_Code}}</td>
                            <td>{{$cm->Title}}</td>
                            <td>{{$cm->Content}}</td>
                            <td>{{$cm->Rate}}</td>
                            <td>{{$cm->created_at}}</td>
                            <td>{{$cm->updated_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/delete/{{$cm->ID}}/{{$tour1->ID}}">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- /.container-fluid -->
</div>

<?php
   

?>
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
            // alert(img);
            $.get("admin/ajax/tour/img/"+img,function(data){
                $("#img1").html(data);
            });
        });        
    });
</script>


@endsection