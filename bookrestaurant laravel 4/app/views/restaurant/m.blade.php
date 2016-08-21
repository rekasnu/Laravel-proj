@layout('index')

@section('content')

	<div class="container">
		<h1>nesaproyu</h1>
		<div id="log">
			<div class="t">
				<div class="span4 offset4">
					<div class="well">
					<legend>Restaurant search </legend>
					{{ Form::open(array('/', 'onsubmit'=>'check()')) }}
					<label for="username" class="control-label">Please enter your location : </label>
					{{ Form::text('location', '', array('id'=>'location','class'=>'span3', 'placeholder'=>'Location')) }}
					{{ Form::submit('Search', array('class'=>'btn btn-success')) }}
					{{ Form::close() }}
					</div>	
				</div>
			</div>
		</div>
		<img src="images/rd.jpg" alt="Mountain View">
	</div>	
@endsection
