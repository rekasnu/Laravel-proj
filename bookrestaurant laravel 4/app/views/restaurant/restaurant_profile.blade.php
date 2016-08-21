@extends('restaurant.index')
@section('content')
	<h1 class="reg-text">Profile here !!!</h1>
<br /><br /><br /><br />
<h1 class="reg-text">Restaurant No. {{$id}}</h1>


		<img class='pic1' src="{{ 'data: '.$restaurant->type.';base64,'.$restaurant->picture }}">


<div class="row">
	<div class="col-xs-12 col-sm-4 col-md-4 col-xlg-4">
		<div class="form-group">
		{{Form::button('Make order', array('class'=>'btn btn-primary btn-lg ','type'=>'button','onclick'=>'begin()'))}}
		</div>
	</div>
	<div class="col-xs-12 col-sm-8 col-md-8 col-xlg-8">
		<div class="form-group">
			<div class='panel'>

			<ul class='nav nav-tabs' id='menu_tab'>

				@if($categories != null)
					<?php $i = 0; ?>
					@foreach($categories as $k)
					
							@if($i == 0)
							<li class="active">{{HTML::link('#'.str_replace(' ', '_', $k->category).'',$k->category,array('id' =>str_replace(' ', '_', $k->category).'s','name' =>str_replace(' ', '_', $k->category)))}}</li>
							@else
							<li>{{HTML::link('#'.str_replace(' ', '_', $k->category).'',$k->category,array('id' =>str_replace(' ', '_', $k->category).'s','name' =>str_replace(' ', '_', $k->category)))}}</li>
							@endif
						<?php $i = $i+1; ?>
					
					@endforeach
					@if($i ==0)
							<h4>You haven't created menu</h4>
					@endif
				@endif
		
			</ul>

			<div class="tab-content" id='tab-content'>
				@if($categories != null)
					<?php $i = 0; ?>
					@foreach($categories as $k)
						@if($i ==0)
							<div class="tab-pane fade in active" id="{{ str_replace(' ', '_', $k->category) }}" >
						@else
							<div class="tab-pane fade" id="{{ str_replace(' ', '_', $k->category) }}" >
						@endif
						<h2>{{$k->category}}</h2>
						<table class="table text-left" id="{{str_replace(' ', '_', $k->category)}}_table">
							<tr class='info'>
								<th>No.</th>
								<th>Dish name</th>
								<th>Description</th>
								<th>Price</th>
								<th></th>
							</tr>
								<?php $no = 1; ?>
								@foreach($items as $it)
									@if($k->category_id == $it->category_id)
										<tr id="a{{$it->id}}">
											<td>{{$no}}</td>
											<td>{{$it->dish_name}}</td>
											<td>{{$it->description}}</td>
											<td>{{$it->price}}</td>
										</tr>
										<?php $no++; ?>
									@endif
								@endforeach
								
							</table>
						</div>
					<?php $i = $i+1; ?>
					@endforeach
				@endif

		
			</div>
		</div>
		</div>
	</div>
</div>
</div>
<div id="postid" class="hidden">
		{{ Form::open(array('url' => 'make_order', 'method' => 'POST')) }}
		{{ Form::text('restaurant_id', '', array('id'=>'re_id')) }}
		{{ Form::submit('Submit', array('id'=>'sub')) }}
		{{ Form::close() }}
</div>




<script>
$(document).ready(function(){ 
		$("#menu_tab a").click(function(e){
			e.preventDefault();
			$(this).tab('show');
			activeTab = e.target.name;

		});
	});
function begin(){

	document.getElementById('re_id').value = {{$id}};
	document.getElementById("sub").click();
    }
/*	function geoFindMe(){
 
      if(navigator.geolocation){
          navigator.geolocation.getCurrentPosition(success, error, geo_options);
      }else{
          alert("Geolocation services are not supported by your web browser.");
      }
 
 
function success(position) {
 var latitude = position.coords.latitude;
 var longitude = position.coords.longitude;
 var altitude = position.coords.altitude;
 var accuracy = position.coords.accuracy;
 
 //do something with above position thing e.g. below
 alert('I am here! lat:' + latitude +' and long : ' +longitude );
}
 
function error(error) {
 alert("Unable to retrieve your location due to "+error.code + " : " + error.message);
 };
 
var geo_options = {
 enableHighAccuracy: true,
 maximumAge : 30000,
 timeout : 27000
 };
}*/
</script>

@endsection