<nav>
    <ul id="navigation">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('watch')}}">Watch</a></li>

        @foreach ($city as $c)
            <li class="nav-item {!! in_array($c->id,$church2)?'dropdown':'' !!}"><a class="nav-link {!! in_array($c->id,$church2)?'dropdown-toggle':'' !!}" href="#">{{$c->title}}</a>
            @php $i = 0 @endphp
            @foreach($church as $key=>$ch)
                @if ($c->id == $ch->parent)
                    {!!$i == 0?'<ul class="submenu">':''!!}
                    <li><a href="{{route('church_detail',['url'=>$ch->url])}}">{{$ch->title}}</a></li>
                    @php $i++ @endphp
                @endif
                @if ($i > 0 && $key==count($church)-1 )
                    </ul>
                @endif
            @endforeach
            </li>
        @endforeach

        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#">Update</a>
            <ul class="submenu">
                @foreach ($prepareData as $pd)
                    {!! $pd->type == 'info'?'<li><a href="'.url($pd->url).'">'.$pd->name.'</a></li>':'' !!}
                @endforeach
            </ul>
        </li>
        <li><a href="{{url('contact')}}">Contact</a></li>
    </ul>
</nav>
