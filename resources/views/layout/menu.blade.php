<div class="col-md-3 ">
    <ul class="list-group" id="menu" >
        <li href="#" class="list-group-item menu1 active" style="height: 64px;">
        	Menu
        </li>

        @foreach($directory as $d)
        	@if(count($d->places)>0)
		        <li class="list-group-item menu1">
		        	{{$d->Directory}}
		        </li>
		        <ul>
		        	@foreach($d->places as $p)
		    		<li class="list-group-item">
		    			<a style="text-decoration: none; color:	#336600;" class="a" href="places/{{$p->ID}}/{{$p->Name_Places_URL}}.html">{{$p->Name_Places}}</a>
		    		</li>
		    		@endforeach
		        </ul>
		    @endif
		@endforeach
		@foreach($directory as $d)
        	@if(count($d->places)>0)
		        <li class="list-group-item menu1">
		        	{{$d->Directory}}
		        </li>
		        <ul>
		        	@foreach($d->places as $p)
		    		<li class="list-group-item">
		    			<a style="text-decoration: none; color:	#336600;" class="a" href="places/{{$p->ID}}/{{$p->Name_Places_URL}}.html">{{$p->Name_Places}}</a>
		    		</li>
		    		@endforeach
		        </ul>
		    @endif
		@endforeach
		@foreach($directory as $d)
        	@if(count($d->places)>0)
		        <li class="list-group-item menu1">
		        	{{$d->Directory}}
		        </li>
		        <ul>
		        	@foreach($d->places as $p)
		    		<li class="list-group-item">
		    			<a style="text-decoration: none; color:	#336600;" class="a" href="places/{{$p->ID}}/{{$p->Name_Places_URL}}.html">{{$p->Name_Places}}</a>
		    		</li>
		    		@endforeach
		        </ul>
		    @endif
		@endforeach

    </ul>
</div>