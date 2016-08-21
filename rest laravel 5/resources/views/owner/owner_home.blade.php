@extends('restaurant.index')

@section('content')

	<h1 class="reg-text">Owners Home Page</h1>

	<div class="row">
		<div class="col-md-3 col-md-offset-2 pp">
			{!! HTML::link('owner_home#','Create restaurant profile', array('type'=>'button','class'=>'btn btn-primary btn-lg vv xl'))!!}
		</div>
		<div class="col-md-3 col-md-offset-1 pp">
			{!! HTML::link('owner_home#','View Orders', array('type'=>'button','class'=>'btn btn-success xl vv'))!!}
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-md-offset-2 pp">
			{!! HTML::link('register_chef','Register Chef', array('type'=>'button','class'=>'btn btn-warning btn-lg vv xl'))!!}
		</div>
		<div class="col-md-3 col-md-offset-1 pp">
			{!! HTML::link('owner_home#','View whatewer', array('type'=>'button','class'=>'btn btn-warning btn-lg vv xl'))!!}
		</div>
	</div>
@endsection