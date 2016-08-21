@extends('restaurant.index')

@section('content')
		<div class='t' data-ng-app='login'>
			

				<div class='well'>

				<legend><b>Password reset</b></legend>
				{{ Form::open(array('url' => 'reset4','id'=>'fo','name'=>'lo','data-ng-submit'=>'submitFo(lo.$valid)','novalidate' =>'novalidate', 'method' => 'POST')) }}
				<div class="form-group">
					<div class="row">
					{{Form::label('fname','Login name : ', array('class'=>'control-label col-xs-12 col-sm-6 tl'))}}
					<div class="col-xs-12 col-sm-6">
					{{ Form::text('login_name', '', array('id'=>'l_n','class'=>'form-control input-md', 'placeholder'=>'Login name','data-ng-trim'=>'true','data-ng-model'=>'user.login_name','data-ng-minlength'=>'0','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','data-ng-pattern'=>'/^[a-z0-9._-]+[_.-]?[a-z0-9._-]+$/i', 'required')) }}
					</div>
					</div>
					<div class="row">
					<div class='error pp' data-ng-if='lo.login_name.$error.required && lo.login_name.$dirty'>
						Login name is required.
					</div>
					<div class='error pp' data-ng-if='lo.login_name.$error.pattern && lo.login_name.$dirty'>
						Login name does not meet the requirements
					</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
					{{Form::label('password','Password : ', array('class'=>'control-label col-sm-6 tl')) }}
					<div class="col-sm-6">
					{{ Form::password('password', array('id'=>'pass','class'=>'form-control input-md', 'placeholder'=>'Password','data-ng-model'=>'user.password','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','data-ng-pattern'=>'/^[a-z0-9._-]+[_.-]?[a-z0-9._-]+$/i','required')) }}
					</div>
					</div>
					<div class="row">
					<div class='error pp' data-ng-if='lo.password.$error.pattern && lo.password.$dirty'>
						Password does not meet the requirements
					</div>
					<div class='error pp' data-ng-if='lo.password.$error.required && lo.password.$dirty'>
						Password name is required.
					</div>
					</div>
				</div>
				<div class="form-group">
				<div class="row">
					{{Form::label('password1','Confirm password : ', array('class'=>'control-label col-sm-6 tl')) }}
					<div class="col-sm-6">
					{{ Form::password('password_confirmation', array('id'=>'pass','class'=>'form-control input-md', 'placeholder'=>'Password','data-ng-model'=>'user.password1','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','data-ng-pattern'=>'/^[a-z0-9._-]+[_.-]?[a-z0-9._-]+$/i','required')) }}
					</div>
					</div>
					<div class="row">
						<div class='error pp' data-ng-if='lo.password_confirmation.$error.pattern && lo.password_confirmation.$dirty'>
						Password does not meet the requirements
						</div>
						<div class='error pp' data-ng-if='lo.password_confirmation.$error.required && lo.password_confirmation.$dirty'>
						Password name is required.
						</div>
					</div>
				</div>
				 {{ Form::hidden('code', $code) }}
				<div class='form-group col-sm-offset-4'>
					{{ Form::submit('Submit', array('data-ng-disabled'=>'lo.$invalid && !lo.dirty','class'=>'btn btn-success')) }}
					{{ HTML::link('login', 'Back', array('class'=>'btn btn-primary')) }}
				</div>
				{{ Form::close() }}
				</div>	
			
		
		</div>

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