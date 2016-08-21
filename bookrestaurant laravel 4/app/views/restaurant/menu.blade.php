@extends('restaurant.index')

@section('content')


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
										<td><a id='{{$it->id}}' onclick='if(!window.confirm("Do you realy want to delete ?"))return false;adelete(this.id)'><img class="ico1" src="Images/trash_recyclebin_empty_closed.png" alt="Delete file"></a></td>
										<td><a href="edit?code={{ $it->id}}"><img class="ico" src="Images/edit-icon.png" alt="Edit"></a></td>
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
<script>

	$(document).ready(function(){ 
		$("#menu_tab a").click(function(e){
			e.preventDefault();
			$(this).tab('show');
			activeTab = e.target.name;

		});
	});

</script>
@endsection