<?php
    if(isset( $_GET['idPlaces']) ) {
        $idPlaces =$_GET['idPlaces'];
    } else {
        $idPlaces = 0;
    }

    if(isset( $_GET['order']) ) {
        $order =$_GET['order'];
    } else {
        $order = "";
    }

    if(isset( $_GET['rate']) ) {
        $star =$_GET['rate'];
    } else {
        $star = "";
    }

    if(isset( $_GET['search']) ) {
        $search =$_GET['search'];
    } else {
        $search = "";
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
        <h5 class="filter-sub-titel">Giá </h5>
            <div class="categori-checkbox">
                <form action="#">
                    <ul>
                        <li>
                            <input id="maxMin" type="radio" value="desc" name="order" onclick="searchMaxMin( {{$idPlaces}}, [ this.value, 
                                
                            '{{ $star }}']) "
                                @if (isset($order) && $order == "desc")
                                    {{'checked'}}
                                @endif
                            >Giá (Cao -> Thấp)
                        </li>
                        <li>
                            <input id="minMax" type="radio" value="asc" name="order" onclick="searchMaxMin( {{$idPlaces}}, [ this.value, 
                                '{{ $star }}', '{{ $search }}']) " 
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
            <h5 class="filter-sub-titel">Đánh Giá {{ $star }}</h5>
            <div class="categori-checkbox">
                <form action="#">
                    <ul>
                        @for($i = 1 ; $i<=5 ; $i++)
                        <li onclick="searchMaxMin( {{ $idPlaces }}, 
                            ['{{ $order }}' ,
                            '{{ $i }}', '{{ $search }}']
                            )">{{$i}}<i class="fa fa-star" style="font-size:28px;color:red"></i>-></li>
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
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    function isset (ref) { 
        return typeof ref !== 'undefined'
    }

    function searchMaxMin(idPlaces, data ) {
        if (idPlaces == 0) {
            alert('Vui lòng chọn địa điểm trước khi tìm kiếm nâng cao.')
        } else {
            namePlacesURL = $("#idPlaces_"+idPlaces+"").attr("namePlacesURL");
            directoryURL = $("#idPlaces_"+idPlaces+"").attr("DirectoryURL");
        
            order = "";
            rate = "";
            search "";
            stringURL = "";

            if(data[0] == '')
            {
                order = "";
            } else {
                order = '&order='+data[0];
            }

            if(data[1] == '')
            {
                rate = "";
            } else {
                rate = '&rate='+data[1];
            }

            if(data[2] == '')
            {
                search = "";
            } else {
                search = '&search='+data[2];
            }
            stringURL = order + rate + search;
            console.log(stringURL);
        
            var maxMin = document.getElementById("maxMin");

            var isMaxMin = maxMin.checked;

            // if(isMaxMin == true ) {
            //     console.log('true');
            //     console.log(stringURL);
                
            //     $.ajax({
            //     url: "PLaces/"+directoryURL+"/"+namePlacesURL+"/search?idPlaces="+idPlaces+"&page=1"+stringURL,
                
            //     data: {
                    
            //     },
            //     method: "get",
            
            //     })
            //     .done(function (results) {
                
            //         window.location = "PLaces/"+directoryURL+"/"+namePlacesURL+"/search?idPlaces="+idPlaces+"&page=1"+stringURL;
            //     })
            //     .fail(function (data) {
                        
            //     });
            // } else {
            //     console.log('false');
            //     console.log(stringURL);
            //     $.ajax({
            //         url: "PLaces/"+directoryURL+"/"+namePlacesURL+"/search?idPlaces="+idPlaces+"&page=1"+stringURL,
                    
            //         data: {
                        
            //         },
            //         method: "get",
                
            //         })
            //         .done(function (results) {
                        
                        
            //             window.location = "PLaces/"+directoryURL+"/"+namePlacesURL+"/search?idPlaces="+idPlaces+"&page=1"+stringURL;
            //         })
            //         .fail(function (data) {
                        
            //     });
            // }
        }
        
    }


</script>

@endsection
