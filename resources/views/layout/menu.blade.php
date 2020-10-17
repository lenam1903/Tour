<?php
    if(isset( $_GET['idPlaces']) ) {
        $idPlaces =$_GET['idPlaces'];
    } else {
        $idPlaces = "";
    }

    if(isset( $_GET['page']) ) {
        $page =$_GET['page'];
    } else {
        $page = "";
    }
?>
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
                                <li><a id="idPlaces_{{$p->ID}}" namePlacesURL="{{$p->Name_Places_URL}}" directoryURL="{{$d->Directory_URL}}" href="PLaces/{{$d->Directory_URL}}/{{$p->Name_Places_URL}}/?idPlaces={{$p->ID}}&page=1">{{$p->Name_Places}}</a></li>
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
        <h5 class="filter-sub-titel">Giá 
            {{-- @foreach(Session::get('search2') as $item)
                {{$item}}
            @endforeach --}}
            moi ne
            {{ Session::get('search') }}</h5>
            <div class="categori-checkbox">
                <form action="#">
                    <ul>
                        <li>
                            <input id="maxMin" type="radio" value="desc" name="order" onclick="searchMaxMin( {{$idPlaces}}, this.value ,{{$page}} ) " 
                                @if (isset($order) && $order == "desc")
                                    {{'checked'}}
                                @endif
                            >Giá (Cao -> Thấp)
                        </li>
                        <li>
                            <input id="minMax" type="radio" value="asc" name="order" onclick="searchMaxMin( {{$idPlaces}}, this.value ,{{$page}} ) " 
                                @if (isset($order) && $order == "asc")
                                    {{'checked'}}
                                @endif 
                            >Giá (Thấp -> Cao)
                        </li>
                     
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
                        <li onclick="searchMaxMin( {{$idPlaces}}, {{$i}} ,{{$page}} )">{{$i}}<i class="fa fa-star" style="font-size:28px;color:red"></i>-></li>
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
    function searchMaxMin(idPlaces, order ,page) {
        console.log(idPlaces);
        console.log(order);
        console.log(page);
        namePlacesURL = $("#idPlaces_"+idPlaces+"").attr("namePlacesURL");
        directoryURL = $("#idPlaces_"+idPlaces+"").attr("DirectoryURL");
       

        
        var maxMin = document.getElementById("maxMin");

        var isMaxMin = maxMin.checked;

        if(isMaxMin == true ) {
            
            $.ajax({
            url: "PLaces/"+directoryURL+"/"+namePlacesURL+"/search?order="+order+"&page="+page,
            
            data: {
                idPlaces: idPlaces,
                order: order,
                page: page,
                
            },
            method: "get",
        
            })
            .done(function (results) {
                
              
                window.location = "PLaces/"+directoryURL+"/"+namePlacesURL+"/search?idPlaces="+idPlaces+"&order="+order+"&page="+page;
            })
            .fail(function (data) {
                    
            });
        } else {
            $.ajax({
            url: "PLaces/"+directoryURL+"/"+namePlacesURL+"/search?order="+order+"&page="+page,
            
            data: {
                idPlaces: idPlaces,
                order: order,
                page: page,
                
            },
            method: "get",
        
            })
            .done(function (results) {
                
                
                window.location = "PLaces/"+directoryURL+"/"+namePlacesURL+"/search?idPlaces="+idPlaces+"&order="+order+"&page="+page;
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
