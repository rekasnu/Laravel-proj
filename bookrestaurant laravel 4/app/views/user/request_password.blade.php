
@extends('restaurant.index')

@section('content')

	<div class='t well row' data-ng-app='login'>
	
			<legend><b>Reques password reset</b></legend>
			{{ Form::open(array('url' => 'reset2','id'=>'fo','name'=>'lo','data-ng-submit'=>'submitFo(lo.$valid)','novalidate' =>'novalidate', 'method' => 'POST')) }}
			<div class="form-group">
				{{Form::label('email','Email : ')}}
				{{Form::text('email', '', array('id'=>'email','data-ng-model' =>'user.email','class'=>'span6', 'data-ng-pattern'=>'/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/','data-ng-model-options'=>'{ debounce: { "default" : 200 } }', 'required') )}}
				<div class="error" 
			        data-ng-show="lo.email.$invalid">
			    <small class="error" 
				        data-ng-if=" lo.email.$error.required && lo.email.$dirty">
				        Your email is required.
			    </small>
			    <small class="error" 
			            data-ng-if=" lo.email.$error.pattern && lo.email.$dirty">
			            Walid email required.
			    </small>
				</div>
			</div>
			<div class='form-group'>
				{{ Form::submit('Request', array('data-ng-disabled'=>'lo.$invalid && !lo.dirty','class'=>'btn btn-success')) }}
				{{ HTML::link('', 'Cancel', array('class'=>'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
		
	</div>
<script>


	var app = angular.module('login',[]);
	app.controller('logc',['$scope', function($scope){

		$scope.submitFo = function (form){
			if(form){
				$( "#fo" ).submit(function( event ) {
					event.preventDefault();
				});
				var a = document.getElementById('email').value;
				a = String.trim(a);
				document.getElementById('email').value = a;
				document.getElementById('fo').submit();
			}else{
				$( "#fo" ).submit(function( event ) {
					event.preventDefault();
				});
			}
		}

	}]);

</script>

@endsection