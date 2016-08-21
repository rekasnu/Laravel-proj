@extends('restaurant.index')

@section('content')
		<h1 class="reg-text">Chefs Home Page</h1>
	<div class="row">
		<div class="col-md-3 col-md-offset-2 pp">
			{{ HTML::link('table_orders','Table orders', array('type'=>'button','class'=>'btn btn-primary btn-lg vv xl'))}}
		</div>
		<div class="col-md-3 col-md-offset-1 pp">
			{{ HTML::link('chef_menu','Menu', array('type'=>'button','class'=>'btn btn-success xl vv'))}}
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-md-offset-2 pp">
			{{ HTML::link('chef#','Booking orders', array('type'=>'button','class'=>'btn btn-warning btn-lg vv xl'))}}
		</div>
		<div class="col-md-3 col-md-offset-1 pp">
			{{ HTML::link('chef#','View whatewer', array('type'=>'button','class'=>'btn btn-warning btn-lg vv xl'))}}
		</div>
	</div>
@endsection