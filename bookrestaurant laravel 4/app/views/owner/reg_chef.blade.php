@extends('restaurant.index')
@section('content')

	<div data-ng-app="register" class='e1 well mid'>
		<div data-ng-controller="registerChef">
		<legend>Register Chef</legend>
		{{Form::open(array('url'=>'register_chef2','id'=>'fm', 'name'=>'regchef', 'data-ng-submit'=>'send(regchef.$valid)', 'novalidate'=>'novalidate', 'method'=>'POST', 'class'=>'form-horizontal')) }}
		<div class="form-group">
			{{Form::label('rest','Restaurant name : ',array('class'=>'control-label col-sm-4 tl'))}}
			<div class='col-sm-8'>
			{{Form::text('rest_name','',array('id'=>'rest_id','data-ng-model'=>'chef.rest_name', 'data-ng-pattern'=>'/^[A-za-z0-9 àâäôéèëêïîçùûüÿæœÀÂÄÔÉÈËÊÏÎŸÇÙÛÜÆŒ]+[_.-]?[A-za-z0-9àâäôéèëêïîçùûüÿæœÀÂÄÔÉÈËÊÏÎŸÇÙÛÜÆŒ]+$/i','data-ng-minlength' =>'2', 'data-ng-maxlength' => '50','class'=>'form-control input-md','required'))}}
				<small class="error" 
			        data-ng-if=" regchef.rest_name.$error.required && regchef.rest_name.$dirty">
			        Your name is required.
			    </small>
			    <small class="error" 
				            data-ng-if="regchef.rest_name.$error.minlength && regchef.rest_name.$dirty ">
				            Your name is required to be at least 2 characters long
				    </small>
				    <small class="error" 
				            data-ng-if=" regchef.rest_name.$error.maxlength && regchef.rest_name.$dirty">
				            Your name cannot be longer than 50 characters
				    </small>
			    <small class="error" 
			            data-ng-if="regchef.rest_name.$error.minlength && regchef.rest_name.$dirty ">
			            Id does not meet character requirements.
			    </small>
			    <small class="error" 
				            data-ng-if="!regchef.rest_name.$error.minlength && regchef.rest_name.$error.pattern">
				            Your restaurant name cannot contain special characters
				</small>
			</div>
		</div>
		<div class="form-group">
		{{Form::label('fname','Name : ', array('class'=>'control-label col-sm-4 tl'))}}
			<div class='col-sm-8'>
			{{Form::text('first_name','',array('id'=>'first_name','data-ng-model' =>'chef.first_name','class'=>'form-control input-md','data-ng-minlength' =>'2', 'data-ng-maxlength' => '20' , 'data-ng-pattern'=>'/^[a-z0-9]+[_.-]?[a-z0-9]+$/i','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','required'))}}

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
		{{Form::label('lname','Last name : ',array('class'=>'control-label col-sm-4 tl'))}}
			<div class="col-sm-8">
			{{Form::text('last_name','', array('id'=>'last_name','data-ng-model'=>'chef.last_name','class'=>'form-control input-md', 'data-ng-minlength' =>'2', 'data-ng-maxlength' => '20' , 'data-ng-pattern'=>'/^[a-z0-9]+[_.-]?[a-z0-9]+$/i','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','required'))}}
					<small class="error" 
				        data-ng-if=" regchef.last_name.$error.required && regchef.last_name.$dirty">
				        Your name is required.
				    </small>
				    <small class="error" 
				            data-ng-if="regchef.last_name.$error.minlength && regchef.last_name.$dirty ">
				            Your last name is required to be at least 2 characters long
				    </small>
				    <small class="error" 
				            data-ng-if=" regchef.last_name.$error.maxlength && regchef.last_name.$dirty">
				            Your last name cannot be longer than 20 characters
				    </small>
				    <small class="error" 
				            data-ng-if="!regchef.last_name.$error.minlength && regchef.last_name.$error.pattern">
				            Your last name cannot contain spaces and special characters
				    </small>
			</div>
		</div>

		<div class='form-group'>
		{{Form::label('login','Login name : ',array('class'=>'control-label col-sm-4 tl'))}}
			<div class="col-sm-8">
			{{Form::text('login_name','', array('id'=>'login_name','ng-value'=>'chef.login_name','data-ng-model'=>'chef.login_name','class'=>'form-control input-md', 'data-ng-minlength' =>'2', 'data-ng-maxlength' => '20' , 'data-ng-pattern'=>'/^[a-z0-9]+[_.-]?[a-z0-9]+$/i','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','required'))}}
				<div class="error" 
				        data-ng-show="regchef.login_name.$invalid">	
					<small class="error" 
				        data-ng-if=" regchef.login_name.$error.required && regchef.login_name.$dirty">
				        Your login name is required.
				    </small>
				    <small class="error" 
				            data-ng-if="regchef.login_name.$error.minlength && regchef.login_name.$dirty ">
				            Your login name is required to be at least 2 characters long
				    </small>
				    <small class="error" 
				            data-ng-if=" regchef.login_name.$error.maxlength && regchef.login_name.$dirty">
				            Your login name cannot be longer than 20 characters
				    </small>
				    <small class="error" 
				            data-ng-if="!regchef.login_name.$error.minlength && regchef.login_name.$error.pattern">
				            Your login name cannot contain spaces and special characters
				    </small>
				</div>
			</div>
		</div>
		<div class='form-group'>
		{{Form::label('login','Telephone : ',array('class'=>'control-label col-sm-4 tl'))}}
			<div class="col-sm-8">
				{{ Form::text('telephone_noo', '', array('id'=>'telephone_noo','ng-value'=>'chef.telephone_noo','data-ng-model'=>'chef.telephone_noo','class'=>'form-control input-md', 'data-ng-minlength' =>'8', 'data-ng-maxlength' => '12' , 'data-ng-pattern'=>'/^[0-9]{8,12}$/','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','required'))}}
				<div class="error" 
				        data-ng-show="regchef.telephone_noo.$invalid">	
					<small class="error" 
				        data-ng-if=" regchef.telephone_noo.$error.required && regchef.telephone_noo.$dirty">
				        Your telephone number is required.
				    </small>
				    <small class="error" 
				            data-ng-if="regchef.telephone_noo.$error.minlength && regchef.telephone_noo.$dirty ">
				            Your telephone number is required to be at least 8 characters long
				    </small>
				    <small class="error" 
				            data-ng-if=" regchef.telephone_noo.$error.maxlength && regchef.telephone_noo.$dirty">
				            Your telephone number cannot be longer than 12 characters
				    </small>
				    <small class="error" 
				            data-ng-if="!regchef.telephone_noo.$error.minlength && regchef.telephone_noo.$error.pattern">
				            Your telephone number cannot contain special characters
				    </small>
				</div>
			</div>
		</div>

		<div class="form-group">
		{{Form::label('email','Email : ', array('class'=>'control-label col-sm-4 tl'))}}
			<div class='col-sm-8'>
			{{Form::text('email','',array('id'=>'email','class'=>'form-control input-md','data-ng-model'=>'chef.email','data-ng-pattern'=>'/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/','data-ng-model-options'=>'{ debounce: { "default" : 200 } }', 'required') )}}
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
		{{Form::label('password','Password : ', array('class'=>'control-label col-sm-4 tl'))}}
			<div class='col-sm-8'>
			{{Form::password('password',array('id'=>'password','class'=>'form-control input-md','data-ng-model'=>'chef.password','data-ng-minlength' =>'2', 'data-ng-maxlength' => '20' , 'data-ng-pattern'=>'/^[a-z0-9]+[_.-]?[a-z0-9]+$/i','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','required'))}}
				<div class="error" 
				        data-ng-show="regchef.password.$invalid">	
					<small class="error" 
				        data-ng-if=" regchef.password.$error.required && regchef.password.$dirty">
				        Your name is required.
				    </small>
				    <small class="error" 
				            data-ng-if="regchef.password.$error.minlength && regchef.password.$dirty ">
				            Your password is required to be at least 2 characters long
				    </small>
				    <small class="error" 
				            data-ng-if=" regchef.password.$error.maxlength && regchef.password.$dirty">
				            Your password cannot be longer than 20 characters
				    </small>
				    <small class="error" 
				            data-ng-if="!regchef.password.$error.minlength && regchef.password.$error.pattern">
				            Your password cannot contain spaces and special characters
				    </small>
				</div>
			</div>
		</div>

		<div class="form-group">
		{{Form::label('password_confirmation','Re - Password : ', array('class'=>'control-label col-sm-4 tl'))}}
			<div class='col-sm-8'>
			{{Form::password('confirm_password',array('id'=>'re_password','class'=>'form-control input-md', 'data-ng-model'=>'chef.confirm_password'))}}
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
		{{ Form::submit('Register', array('class'=>'btn btn-success btn-lg col-md-3 col-md-offset-2 col-xs-3 col-xs-offset-2 col-lg-3 col-lg-offset-2','data-ng-disabled'=>'regchef.$invalid && !regchef.dirty'))}}
		{{HTML::link('owner_home','Back',array('class'=>'btn btn-primary btn-lg col-md-3 col-md-offset-2 col-xs-3 col-xs-offset-2 col-lg-3 col-lg-offset-2'))}}
		</div>
		{{Form::close()}}
		</div>
	</div>
<script>

var app = angular.module('register',[]);
app.controller('registerChef',['$scope', function($scope){
	
		var scope = <?php 
					if(null !== Session::get('chef')){
							echo '{';
							echo ' "rest_name" : "'.Session::get('chef')->rest_name.'",';
							echo ' "first_name" : "'.Session::get('chef')->first_name.'",';
							echo ' "last_name" : "'.Session::get('chef')->last_name.'",';
							echo ' "login_name" : "'.Session::get('chef')->login_name.'",';
							echo ' "telephone_noo" : "'.Session::get('chef')->telephone_noo.'",';
							echo ' "email" : "'.Session::get('chef')->email.'"';
							echo '}';		
						}else{
						 	echo '{}';
						}
					?> ;

		$scope.chef = {

			rest_name : scope.rest_name,
			first_name : scope.first_name,
			last_name : scope.last_name,
			login_name : scope.login_name,
			telephone_noo : scope.telephone_noo,
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