@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>{{$user->Full_Name}}</small>
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

                <form action="admin/user/edit/{{$user->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Full Name *</label>
                        <input class="form-control" name="full_name" placeholder="Please Enter Full Name" value="{{$user->Full_Name}}" />
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" class="form-control" name="email" placeholder="Please Enter Email" value="{{$user->email}}"  readonly="" />
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="changePassword" name="changePassword">
                        <label>Change Password *</label>
                        <input type="password" class="form-control password" name="password" placeholder="Please Enter Password"  disabled="" />
                    </div>
                    <div class="form-group">
                        <label>Enter Password Again *</label>
                        <input type="password" class="form-control password" name="passwordAgain" placeholder="Please Enter Password Again" disabled="" />
                    </div>
                     <div class="form-group">
                        <label>Level</label>
                        <label class="radio-inline">
                            <input name="level" value="0" 
                            @if($user->Level == 0)
                            {{"checked"}}
                            @endif
                            type="radio">User
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="1"
                            @if($user->Level == 1)
                            {{"checked"}}
                            @endif
                            type="radio">Admin
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input class="date form-control" type="text" name="birthday" placeholder="Please Enter Birthday" value="{{$user->Birthday}}" />
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" name="address" placeholder="Please Enter Address" value="{{$user->Address}}" />
                    </div>
                    <div class="form-group">
                        <label>ID Card Number</label>
                        <input class="form-control" name="id_card_number" placeholder="Please Enter ID_Card_Number" value="{{$user->ID_Card_Number}}" />
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input class="form-control" name="phone_number" placeholder="Please Enter Phone_Number" value="{{$user->Phone_Number}}" />
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
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else
                {
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>


@endsection