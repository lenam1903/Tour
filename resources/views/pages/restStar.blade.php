

<div class="comment-review">
<span>Tổng Đánh Giá: {{$id->Rate}} <b> </b> <i class="fa fa-star" style="font-size:48px;color:red"></i> 
                                            </span> 
    </span>
</div>

@foreach($comment1 as $c)
    @if($c->ID_Tour == $idTour)
        <div class="comment-author-infos pt-25">
            <span>
                @if($c->ID_Users == Auth::user()->id)
                    Tôi
                @else
                    {{$c->users->Full_Name}}
                @endif
            </span>
            <p>{{$c->Content}}</p>
            <em>{{$c->created_at}}</em>
            <div class="comment-review">
                <span>Đánh Giá: <b>{{$c->Rate}} </b> <i class="fa fa-star" style="font-size:38px;color:red"></i>
                </span>
            </div>
        </div>
        <div style="height: 50px;"></div>
    @endif
@endforeach


