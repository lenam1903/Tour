@if(Auth::check())
@if(Auth::user()->Level == 1)
<div  class="navbar-default sidebar" role="navigation">


        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a style="color: blueviolet;" href="admin/directory/list"><i class="fa fa-bar-chart-o fa-fw"></i> Danh Mục<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/directory/list">Danh Sách Danh Mục</a>
                        </li>
                        <li>
                            <a href="admin/directory/add">Thêm Danh Mục</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a style="color: blueviolet;" href=""><i class="fa fa-bar-chart-o fa-fw"></i>Địa Điểm<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/places/list">Danh Sách Địa Điểm</a>
                        </li>
                        <li>
                            <a href="admin/places/add">Thêm Địa Điểm</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a style="color: blueviolet;" href=""><i class="fa fa-bar-chart-o fa-fw"></i>Tour<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/tour/list">Danh Sách Tour</a>
                        </li>
                        <li>
                            <a href="admin/tour/add">Thêm Tour</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
             
                <li>
                    <a style="color: blueviolet;" href="admin/slide/list"><i class="fa fa-bar-chart-o fa-fw"></i>Slide<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/slide/list">Slide List</a>
                        </li>
                        <li>
                            <a href="admin/slide/add">Add Slide</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a style="color: blueviolet;" href="admin/user/list"><i class="fa fa-bar-chart-o fa-fw"></i>User<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/user/list">User List</a>
                        </li>
                        <li>
                            <a href="admin/user/add">Add User</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a style="color: blueviolet;" href=""><i class="fa fa-bar-chart-o fa-fw"></i>Lịch Sử Nạp Tiền<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="admin/lich-su-nap-tien/list">Danh Sách</a>
                        </li>
                        <li>
                            <a href="admin/lich-su-nap-tien/add">Thêm</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>

@endif
@endif