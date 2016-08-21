@extends('restaurant.index')

@section('content')

		<div class='t' data-ng-app='login'>
			
			<div class='span4 offset4' data-ng-controller='logc'>
				<div class='well'>
				<legend><b>Please login</b></legend>
				{!! Form::open(array('url' => 'login2','id'=>'fo','name'=>'lo','data-ng-submit'=>'submitFo(lo.$valid)','novalidate' =>'novalidate', 'method' => 'POST')) !!}
				<div class="form-group">
					{!! Form::text('login_name', '', array('id'=>'l_n','class'=>'span3', 'placeholder'=>'Login name','data-ng-trim'=>'true','data-ng-model'=>'user.login_name','data-ng-minlength'=>'0','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','data-ng-pattern'=>'/^[a-z0-9._-]+[_.-]?[a-z0-9._-]+$/i', 'required')) !!}
					{!! Form::password('password', array('id'=>'pass','class'=>'span3', 'placeholder'=>'Password','data-ng-model'=>'user.password','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','data-ng-pattern'=>'/^[a-z0-9._-]+[_.-]?[a-z0-9._-]+$/i','required')) !!}
				
					<div class='error' data-ng-if='lo.login_name.$error.pattern && lo.login_name.$dirty'>
						Login name does not meet the requirements
					</div>
					<div class='error' data-ng-if='lo.password.$error.pattern && lo.login_name.$dirty'>
						Password does not meet the requirements
					</div>
				</div>
				<div class='form-group'>
					{!! Form::submit('Sign in', array('data-ng-disabled'=>'lo.$invalid && !lo.dirty','class'=>'btn btn-success')) !!}
					{!! HTML::link('register', 'Register', array('class'=>'btn btn-primary')) !!}
				</div>
				{!! Form::close() !!}
				</div>	
			</div>
			
		</div>
			<img class='mid' src='images/slide-4.jpg' alt="Mountain View" />
	

<script>


	var app = angular.module('login',[]);
	app.controller('logc',['$scope', function($scope){

		$scope.submitFo = function (form){
			if(form){
				$( "#fo" ).submit(function( event ) {
					event.preventDefault();
				});
				var a = document.getElementById('l_n').value;
				a = String.trim(a);
				document.getElementById('l_n').value = a;
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