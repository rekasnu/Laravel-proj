@extends('restaurant.index')

@section('content')

	<h1 class="reg-text">Restaurant No. {{$id}}</h1>
	<div class="t">
	<div class="well">
	{{ Form::open(array('url' => 'make_order_st1','id'=>'dateRangeForm','name'=>'lo', 'method' => 'POST')) }}
		<div class="row">
	    <div class="form-group">
	        {{Form::label('datel','Date : ', array('class'=>'control-label col-xs-12 col-sm-3 tl'))}}
	       	<div class="col-xs-12">
	            <div class="input-group input-append date" id="dateRangePicker">
	            {{ Form::text('date', '', array('id'=>'l_n','class'=>'form-control input-md'))}}
	                <span class="input-group-addon add-on">
	                <span class="glyphicon glyphicon-calendar input-md"></span>
	                </span>
	            </div>
	        </div>
	    </div>
		</div>
		<div class="row">
			{{Form::label('datel','Would you like to select meal? ', array('class'=>'controll-label pp'))}}
			{{Form::checkbox('book','yes', false ,array('onclick'=>'test()','id'=>'book1'));}}
		</div>
	</div>
	</div>
	<div id="menu1">
			<div class='panel minww'>

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
								
								<th class="col-md-2 col-xs-2 col-sm-2 col-lg-2">Dish name</th>
								<th class="col-md-4 col-xs-4 col-sm-4 col-lg-4">Description</th>
								<th class="col-md-3 col-xs-2 col-sm-2 col-lg-2">Price</th>
	
								<th class="col-md-3 col-xs-4 col-sm-4 col-lg-2 www">Quantity</tr>
							</tr>
								<?php $no = 1; ?>
								@foreach($items as $it)
									@if($k->category_id == $it->category_id)
										<tr id="a{{$it->id}}">
											
											<td>{{$it->dish_name}}</td>
											<td>{{$it->description}}</td>
											<td>{{$it->price}}</td>
											<td >
											<div>
												<div class="input-group">
										          <span class="input-group-btn">
										              <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[{{$it->id}}]">
										                <span class="glyphicon glyphicon-minus"></span>
										              </button>
										          </span>
										          <input type="text" name="quant[{{$it->id}}]" class="form-control input-number" value="0" min="1" max="100">
										          <span class="input-group-btn">
										              <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[{{$it->id}}]">
										                  <span class="glyphicon glyphicon-plus"></span>
										              </button>
										          </span>
										      </div>
										    </div>
											</td>
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

    <div class="form-group">
        <div class="col-xs-5 col-xs-offset-3">
            <button type="submit" class="btn btn-default btn-lg">Submit order</button>
        </div>
    </div>
    {{ Form::hidden('restaurant_id', $id) }}
	{{ Form::close() }}



<script>
	$(document).ready(function() {
		$("#menu1").hide();
    $('#dateRangePicker')
        .datepicker({
            format: 'yyyy/mm/dd',
            startDate: '2015/06/01',
            endDate: '2020/12/30'
        });
    $("#menu_tab a").click(function(e){
			e.preventDefault();
			$(this).tab('show');
			activeTab = e.target.name;

		});
    $('#dateRangePicker').on('changeDate', function(ev){
	    $(this).datepicker('hide');
	});
});
function test(){	
        if (document.getElementById("book1").checked === true) {
            $("#menu1").show();
        } else {
            $("#menu1").hide();
        }
}





</script>
@endsection