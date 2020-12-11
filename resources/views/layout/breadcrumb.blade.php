<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
            @php $param = explode("|",$title) @endphp
			<div class="col-sm-6"><h1 class="m-0 text-dark">{{$param[0]}}</h1></div>
			<div class="col-sm-6">
				@if($contentehader=='btn')
					<a href="{{ url($btn['url']) }}" class="btn btn-primary btn-sm float-sm-right" title="{{$btn['title']}}"><i class="{{$btn['icon']}}"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                @elseif($contentehader=='mdl')
					<button type="button" onClick='showM("{{url($btn['url'])}}");return false' class="btn btn-primary btn-sm float-sm-right" data-toggle="modal" title="{{$btn['title']}}"><i class="{{$btn['icon']}}"></i></button>
				@elseif($contentehader=='bc')
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="">Home</a></li>
						@foreach($bc as $bc)
							<li class="breadcrumb-item {!! $bc['active']=='1'?'active">'.$bc['title']:'"><a href="'.url($bc['url']).'">'.$bc['title'].'</a>' !!}</li>
						@endforeach
					</ol>
                @endif
                @if(isset($search))
                    <a class="btn btn-success btn-sm float-sm-right" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                @endif
			</div>
		</div>
	</div>
</div>
