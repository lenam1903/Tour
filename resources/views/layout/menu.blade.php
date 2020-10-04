<div class="col-md-3">
    <!--sidebar-categores-box start  -->
    <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
        <div class="sidebar-title">
            <h2>Địa Điểm </h2>
        </div>
        <!-- category-sub-menu start -->
        <div class="category-sub-menu">
            <ul>
                @foreach($directory as $d)
                    <li class="has-sub"><a href="# ">{{$d->Directory}}</a>
                        <ul>
                        @foreach($places as $p)
                            @if($d->ID == $p->ID_Directory)
                                <li><a href="PLaces/{{$d->Directory_URL}}/{{$p->Name_Places_URL}}/?places={{$p->ID}}&page=0">{{$p->Name_Places}}</a></li>
                            @endif
                        @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- category-sub-menu end -->
    </div>
    <!--sidebar-categores-box end  -->
    <!--sidebar-categores-box start  -->
    <div class="sidebar-categores-box">
        <div class="sidebar-title">
            <h2>Tùy Chọn Nâng Cao</h2>
        </div>
        <!-- btn-clear-all start -->
        <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
        <!-- btn-clear-all end -->
        <!-- filter-sub-area start -->
        <div class="filter-sub-area">
            <h5 class="filter-sub-titel">Giá</h5>
            <div class="categori-checkbox">
                <form action="#">
                    <ul>
                        <li><input id="maxMin" type="checkbox" value="desc" href="javascript:">Giá (Cao -> Thấp)</a></li>
                        <li><a onclick="searchMinMax()" href="javascript:">Giá (Thấp -> Cao)</a></li>
                     
                    </ul>
                </form>
            </div>
        </div>
        <!-- filter-sub-area end -->
        <!-- filter-sub-area start -->
        <div class="filter-sub-area pt-sm-10 pt-xs-10">
            <h5 class="filter-sub-titel">Đánh Giá</h5>
            <div class="categori-checkbox">
                <form action="#">
                    <ul>
                        @for($i = 1 ; $i<=5 ; $i++)
                        <li><input type="checkbox" href="javascript:" onclick="searchStar({{$i}})">{{$i-1}}->{{$i}} <i class="fa fa-star" style="font-size:28px;color:red"></i></a></li>
                        @endfor
                    </ul>
                </form>
            </div>
        </div>
        <!-- filter-sub-area end -->
  
        
       
</div>

<!-- Content Wraper Area End Here -->

@section('script')

<script>
    function searchAdvanced(idPlaces, namePlaces){
        console.log(idPlaces);
        console.log(namePlaces);
        var maxMin = document.getElementById("maxMin");

        var isMaxMin = maxMin.checked;
        desc = $("#maxMin").val();
        // console.log(desc);
        if(isMaxMin == true ) {
            $.ajax({
            url: "searchAdvanced",
            data: {
                idPlaces: idPlaces,
                namePlaces: namePlaces,
                desc: desc,
                
            },
            method: "get",

        
            })
            .done(function (results) {
                
                $("#list-view").empty();
                $("#list-view").html(results);
                alertify.success('Đã xuất hiện danh sách Tour ở: '+ '\xa0\xa0\xa0' +namePlaces);
            })
            .fail(function (data) {
                    
            });
        }
    }

    function searchMinMax(){
        
        $.ajax({
            url: "SearchMinMax",
            
            method: "get",
        })
        .done(function (results) {
            
            $("#list-view").empty();
            $("#list-view").html(results);
            alertify.success('Đã xuất hiện danh sách giá Tour từ Thấp -> Cao');
        })
        .fail(function (data) {
                
        });
    }

    function searchStar(star){
      
        $.ajax({
            url: "SearchStar",
            data: {
                'star': star
                },
            method: "get",
        })
        .done(function (results) {
            
            $("#list-view").empty();
            $("#list-view").html(results);
            alertify.success('Đã xuất hiện danh sách Tour có: '+ '\xa0\xa0\xa0' + Number(star - 1) +'->'+star+' sao');
        })
        .fail(function (data) {
                
        });
    }
</script>

@endsection
