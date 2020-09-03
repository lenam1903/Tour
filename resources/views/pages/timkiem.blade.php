@extends('layout.index')

@section('content')

<!-- Page Content -->
<div class="container">
    <div class="row">
        @include('layout.menu')

        <?php
     
		
            function highlight($text, $words) {
			    $highlighted = preg_filter('/' . preg_quote($words, '/') . '/i', '<b><span style="color:red;" class="search-highlight">$0</span></b>', $text);
			    if (!empty($highlighted)) {
			        $text = $highlighted;
			    }

			    return $text;
			}
		?>
        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>Tìm Kiếm : <span style="color: red">{{$tukhoa}}</span></b></h4>
                </div>

                @foreach($tintuc1 as $tt)
                <div class="row-item row">
                    <div class="col-md-3">

                        <a href="detail.html">
                            <br>
                            <img width="200px" height="200px" class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                        </a>
                    </div>

                    <div class="col-md-9">
                        <h3>{!! highlight($tt->TieuDe,$tukhoa) !!} </h3>
                        <p>{!! highlight($tt->TomTat,$tukhoa) !!}</p>
                        <a class="btn btn-primary" href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    <div class="break"></div>
                </div>
                @endforeach

                <div style="text-align: center;">
                  {{-- {{$tintuc1->links()}} --}}
                  {{ $tintuc1->appends(Request::all())->links() }}
                </div> 
            </div>
        </div> 

    </div>
</div>
<!-- end Page Content -->

@endsection