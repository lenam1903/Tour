



<li id="userLogo" class="hm-wishlist">
                                
    <a class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-user" style="font-size:48px;color:blue"></i>
    </a>
    <ul class="dropdown-menu dropdown-user" style="text-align: center;">
        @if(Auth::check())
                <li><i
                        style="font-size:20px;color:blue">{{Auth::user()->email}}</i>
                </li>
                <li><i></i>Số dư:<b style="color: red;">{{number_format(Auth::user()->balance)}}
                    đ</b>
    
                <li><a href="nap-tien"><i></i>Nạp tiền</a>
                <li><a href="Bill"><i></i> Hóa đơn</a>
                    
                </li>
                <li>
                    @if(Auth::user()->Level == 1)
                    
                    <a href="admin/user/edit/{{Auth::user()->id}}"><i
                            ></i>Cài đặt</a>
                    @else 
                    <a href="edit-users/{{Auth::user()->id}}"><i
                        ></i>Cài đặt</a>
                    @endif
                </li>
                <li><a href="logout"><i></i> Đăng xuất</a>
                </li>
                @else
                <li style="margin: auto; padding: 20px;"><a href="javascript:"><button type="button"
                        class="btn btn-primary js-modal-login">
                        Đăng nhập
                    </button></a></li>
                    <li style="margin: auto;"><button type="button"
                        class="btn btn-primary js-modal-register">
                        Đăng ký
                    </button></li>
                @endif
    </ul>
</li>