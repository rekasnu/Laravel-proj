@extends('restaurant.index')
@section('content')

	<div data-ng-app="register" class='e1 well mid'>
		<div data-ng-controller="registerChef">
		<legend>Register Chef</legend>
		{!!Form::open(array('url'=>'register_chef2','id'=>'fm', 'name'=>'regchef', 'data-ng-submit'=>'send(regchef.$valid)', 'novalidate'=>'novalidate', 'method'=>'POST', 'class'=>'form-horizontal')) !!}
		
		{!!Form::text('rest_id','',array('id'=>'rest_id','data-ng-model'=>'rest_id', 'data-ng-value'=>''))!!}
		<div class="form-group">
		{!!Form::label('fname','Name : ', array('class'=>'control-label col-sm-4 tl'))!!}
			<div class='col-sm-8'>
			{!!Form::text('first_name','',array('id'=>'first_name','data-ng-model' =>'chef.first_name','class'=>'form-control input-md','data-ng-minlength' =>'2', 'data-ng-maxlength' => '20' , 'data-ng-pattern'=>'/^[a-z0-9]+[_.-]?[a-z0-9]+$/i','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','required'))!!}

					<small class="error" 
				        data-ng-if=" regchef.first_name.$error.required && regchef.first_name.$dirty">
				        Your name is required.
				    </small>
				    <small class="error" 
				            data-ng-if="regchef.first_name.$error.minlength && regchef.first_name.$dirty ">
				            Your name is required to be at least 2 characters long
				    </small>
				    <small class="error" 
				            data-ng-if=" regchef.first_name.$error.maxlength && regchef.first_name.$dirty">
				            Your name cannot be longer than 20 characters
				    </small>
				    <small class="error" 
				            data-ng-if="!regchef.first_name.$error.minlength && regchef.first_name.$error.pattern">
				            Your name cannot contain spaces and special characters
				    </small>
			</div>
		</div>
	
		<div class='form-group'>
		{!!Form::label('lname','Last name : ',array('class'=>'control-label col-sm-4 tl'))!!}
			<div class="col-sm-8">
			{!!Form::text('last_name','', array('id'=>'last_name','data-ng-model'=>'chef.last_name','class'=>'form-control input-md', 'data-ng-minlength' =>'2', 'data-ng-maxlength' => '20' , 'data-ng-pattern'=>'/^[a-z0-9]+[_.-]?[a-z0-9]+$/i','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','required'))!!}
					<small class="error" 
				        data-ng-if=" regchef.last_name.$error.required && regchef.last_name.$dirty">
				        Your name is required.
				    </small>
				    <small class="error" 
				            data-ng-if="regchef.last_name.$error.minlength && regchef.last_name.$dirty ">
				            Your name is required to be at least 2 characters long
				    </small>
				    <small class="error" 
				            data-ng-if=" regchef.last_name.$error.maxlength && regchef.last_name.$dirty">
				            Your name cannot be longer than 20 characters
				    </small>
				    <small class="error" 
				            data-ng-if="!regchef.last_name.$error.minlength && regchef.last_name.$error.pattern">
				            Your name cannot contain spaces and special characters
				    </small>
			</div>
		</div>

		<div class='form-group'>
		{!!Form::label('login','Login name : ',array('class'=>'control-label col-sm-4 tl'))!!}
			<div class="col-sm-8">
			{!!Form::text('login_name','', array('id'=>'login_name','ng-value'=>'chef.login_name','data-ng-model'=>'chef.login_name','class'=>'form-control input-md', 'data-ng-minlength' =>'2', 'data-ng-maxlength' => '20' , 'data-ng-pattern'=>'/^[a-z0-9]+[_.-]?[a-z0-9]+$/i','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','required'))!!}
				<div class="error" 
				        data-ng-show="regchef.login_name.$invalid">	
					<small class="error" 
				        data-ng-if=" regchef.login_name.$error.required && regchef.login_name.$dirty">
				        Your name is required.
				    </small>
				    <small class="error" 
				            data-ng-if="regchef.login_name.$error.minlength && regchef.login_name.$dirty ">
				            Your name is required to be at least 2 characters long
				    </small>
				    <small class="error" 
				            data-ng-if=" regchef.login_name.$error.maxlength && regchef.login_name.$dirty">
				            Your name cannot be longer than 20 characters
				    </small>
				    <small class="error" 
				            data-ng-if="!regchef.login_name.$error.minlength && regchef.login_name.$error.pattern">
				            Your name cannot contain spaces and special characters
				    </small>
				</div>
			</div>
		</div>

		<div class="form-group">
		{!!Form::label('email','Email : ', array('class'=>'control-label col-sm-4 tl'))!!}
			<div class='col-sm-8'>
			{!!Form::text('email','',array('id'=>'email','class'=>'form-control input-md','data-ng-model'=>'chef.email','data-ng-pattern'=>'/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/','data-ng-model-options'=>'{ debounce: { "default" : 200 } }', 'required') )!!}
					<div class="error" 
				        data-ng-show="regchef.email.$invalid">
				    <small class="error" 
					        data-ng-if=" regchef.email.$error.required && regchef.email.$dirty">
					        Your email is required.
				    </small>
				    <small class="error" 
				            data-ng-if=" regchef.email.$error.pattern && regchef.email.$dirty">
				            Walid email required.
				    </small>
					</div>
			</div>
		</div>

		<div class="form-group">
		{!!Form::label('password','Password : ', array('class'=>'control-label col-sm-4 tl'))!!}
			<div class='col-sm-8'>
			{!!Form::password('password',array('id'=>'password','class'=>'form-control input-md','data-ng-model'=>'chef.password','data-ng-minlength' =>'2', 'data-ng-maxlength' => '20' , 'data-ng-pattern'=>'/^[a-z0-9]+[_.-]?[a-z0-9]+$/i','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','required'))!!}
				<div class="error" 
				        data-ng-show="regchef.password.$invalid">	
					<small class="error" 
				        data-ng-if=" regchef.password.$error.required && regchef.password.$dirty">
				        Your name is required.
				    </small>
				    <small class="error" 
				            data-ng-if="regchef.password.$error.minlength && regchef.password.$dirty ">
				            Your name is required to be at least 2 characters long
				    </small>
				    <small class="error" 
				            data-ng-if=" regchef.password.$error.maxlength && regchef.password.$dirty">
				            Your name cannot be longer than 20 characters
				    </small>
				    <small class="error" 
				            data-ng-if="!regchef.password.$error.minlength && regchef.password.$error.pattern">
				            Your name cannot contain spaces and special characters
				    </small>
				</div>
			</div>
		</div>

		<div class="form-group">
		{!! Form::label('password_confirmation','Re - Password : ', array('class'=>'control-label col-sm-4 tl')) !!}
			<div class='col-sm-8'>
			{!! Form::password('confirm_password',array('id'=>'re_password','class'=>'form-control input-md', 'data-ng-model'=>'chef.confirm_password')) !!}
			</div>
			<div class="error" 
				        data-ng-show="regchef.password.$invalid">
					<small class="error" 
				        data-ng-if=" regchef.password.$error.required && regchef.password.$dirty">
				        Your name is required.
				    </small>
					<small class="error" 
						data-ng-if="regchef.confirm_password.$dirty && regchef.confirm_password.$error.dontMatch">
						Passwords don't match!
					</small>
			</div>
		</div>
		<div class="form-group">
		<br />
		{!! Form::submit('Register', array('class'=>'btn btn-success btn-lg col-md-3 col-md-offset-2 col-xs-3 col-xs-offset-2 col-lg-3 col-lg-offset-2','data-ng-disabled'=>'regchef.$invalid && !regchef.dirty'))!!}
		{!! HTML::link('owner_home','Back',array('class'=>'btn btn-primary btn-lg col-md-3 col-md-offset-2 col-xs-3 col-xs-offset-2 col-lg-3 col-lg-offset-2')) !!}
		</div>
		{!! Form::close() !!}
		</div>
	</div>
<script>

var app = angular.module('register',[]);
app.controller('registerChef',['$scope', function($scope){
	
		var scope = <?php 
					if(null !== Session::get('chef')){
							echo '{';
							echo ' "first_name" : "'.Session::get('chef')->first_name.'",';
							echo ' "last_name" : "'.Session::get('chef')->last_name.'",';
							echo ' "login_name" : "'.Session::get('chef')->login_name.'",';
							echo ' "email" : "'.Session::get('chef')->email.'"';
							echo '}';		
						}else{
						 	echo '{}';
						}
					?> ;

		$scope.chef = {
			
			first_name : scope.first_name,
			last_name : scope.last_name,
			login_name : scope.login_name,
			email : scope.email
		}

		$scope.send = function(ak){
			if(ak){
				$("#fm").submit(function(event){
					event.preventDefault();
				});
					var aform = document.regchef.elements.length;
				for( i=0; i< aform; i++ ){
					var a = regchef.elements[i].value;
					a = String.trim(a);
					regchef.elements[i].value = a;
				}
			}else{
				alert('bebe');
			}
		}
	}]);


	
/*
directives.directive("repeatPassword", function() {
    return {
        require: "ngModel",
        link: function(scope, elem, attrs, ctrl) {
            var otherInput = elem.inheritedData("$formController")[attrs.repeatPassword];

            ctrl.$parsers.push(function(value) {
                if(value === otherInput.$viewValue) {
                    ctrl.$setValidity("repeat", true);
                    return value;
                }
                ctrl.$setValidity("repeat", false);
            });

            otherInput.$parsers.push(function(value) {
                ctrl.$setValidity("repeat", value === ctrl.$viewValue);
                return value;
            });
        }
    };
});

*/
</script>
@endsection