@extends('restaurant.index')

@section('content')
<center>
<div class="tr">
	<div class="span4 offset4">
		<div class="well">
			@if($res2 != null)
				<legend>Restaurant in {{ $location }}</legend>
			
				<h2>{{ $offer }}</h2>
			@else
				<legend>All restaurants</legend>
			@endif
			</center>
			<div class="row pp">
				@foreach ($res as $r)
					<a class="post" onclick="begin(this.id)" id="{{$r->restaurant_id}}"><div class="test well">
						<label> Restaurant name:</label><h3 class="btext"><b>{{$r->rest_name}}</b></h3>
						<label> Location:</label><h4>{{$r->city}}</h4>
					</div></a>

				@endforeach
				@if($res2 != null)
					@foreach ($res2 as $r)
						<a class="post" id="{{$r->restaurant_id}}" onclick="begin(this.id)"><div class="test well">
							<label> Restaurant name:</label><h3 class="btext"><b>{{$r->rest_name}}</b></h3>
							<label> Location:</label><h4>{{$r->city}}</h4>
						</div></a>
					@endforeach
				@endif
			
			</div>
		</div>	
	</div>
</div>
<div id="postid" class="hidden">
		{{ Form::open(array('url' => 'restaurant_profile', 'method' => 'POST')) }}
		{{ Form::text('restaurant_id', '', array('id'=>'re_id')) }}
		{{ Form::submit('Submit', array('id'=>'sub')) }}
		{{ Form::close() }}
</div>
<script type="text/javascript">
var cw = $('.test').width()+30;
$('.test').css({
    'height': cw + 'px'
});

function begin(th){

	document.getElementById('re_id').value = th;
	document.getElementById("sub").click();
    }
</script>


@endsection