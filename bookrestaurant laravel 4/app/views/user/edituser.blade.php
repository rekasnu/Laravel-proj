@extends('restaurant.index')

@section('content')


	<div data-ng-app="editu" class="e1 well mid">
		<div data-ng-controller="updateUser"> 
			<legend> Edit profile </legend>
			{{ Form::open(array('url' => 'edit_save','name'=>'fuser','data-ng-submitted'=>'true','novalidate' =>'novalidate', 'method' => 'POST')) }}
		
			<div class="e2 row">

				<div class="form-group">
					{{Form::hidden('fid','',array('id'=>'fid','data-ng-model'=>'user.fid', 'data-ng-value'=>'user.fid'))}}
					{{Form::label('fname','First name : ') }}
					{{Form::text('first_name', '', array('id'=>'first_name','data-ng-model' =>'user.first_name','class'=>'form-control input-md','data-ng-model-options'=>'{ debounce: { "default" : 200 } }', 'data-ng-minlength' =>'2', 'data-ng-maxlength' => '20' , 'data-ng-pattern'=>'/^[a-z0-9]+[_.-]?[a-z0-9]+$/i','required') )}}
					
				    <small class="error" 
				        data-ng-if=" fuser.first_name.$error.required && fuser.first_name.$dirty">
				        Your name is required.
				    </small>
				    <small class="error" 
				            data-ng-if="fuser.first_name.$error.minlength && fuser.first_name.$dirty ">
				            Your name is required to be at least 2 characters long
				    </small>
				    <small class="error" 
				            data-ng-if=" fuser.first_name.$error.maxlength && fuser.first_name.$dirty">
				            Your name cannot be longer than 20 characters
				    </small>
				    <small class="error" 
				            data-ng-if="!fuser.first_name.$error.minlength && fuser.first_name.$error.pattern">
				            Your name cannot contain spaces and special characters
				    </small>
				
				</div>			  			
				
				<div class="form-group">
					{{Form::label('lname','Last name : ')}}
					{{Form::text('last_name', '', array('id'=>'last_name','data-ng-model' =>'user.last_name','class'=>'form-control input-md', 'data-ng-minlength' =>'2', 'data-ng-maxlength' => '20' , 'data-ng-pattern'=>'/^[a-z0-9]+[_.-]?[a-z0-9]+$/i','data-ng-model-options'=>'{ debounce: { "default" : 200 } }','required') )}}
					<div class="error" 
				        data-ng-show="fuser.last_name.$invalid">
				    <small class="error" 
					        data-ng-if="fuser.last_name.$error.required && fuser.last_name.$dirty">
					        Your name is required.
				    </small>
				    <small class="error" 
				            data-ng-if="fuser.last_name.$error.minlength && fuser.first_name.$dirty">
				            Your name is required to be at least 2 characters long
				    </small>
				    <small class="error" 
				            data-ng-if="fuser.last_name.$error.maxlength && fuser.first_name.$dirty">
				            Your name cannot be longer than 20 characters
				    </small>
				    <small class="error" 
				            data-ng-if="!fuser.first_name.$error.minlength && fuser.last_name.$error.pattern">
				            Your name cannot contain spaces and special characters
				    </small>
					</div>
				</div>

				<div class="form-group">
					{{Form::label('email','Email : ')}}
					{{Form::text('email', '', array('id'=>'email','data-ng-model' =>'user.email','class'=>'form-control input-md', 'data-ng-pattern'=>'/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/','data-ng-model-options'=>'{ debounce: { "default" : 200 } }', 'required') )}}
					<div class="error" 
				        data-ng-show="fuser.email.$invalid">
				    <small class="error" 
					        data-ng-if=" fuser.email.$error.required && fuser.email.$dirty">
					        Your email is required.
				    </small>
				    <small class="error" 
				            data-ng-if=" fuser.email.$error.pattern && fuser.email.$dirty">
				            Walid email required.
				    </small>
					</div>
				</div>


				<div class="form-group pull-right">
					{{Form::submit('Save changes', array('data-ng-disabled'=>'fuser.$invalid','class' => 'btn btn-success btn-md'))}}	

					{{HTML::link('','Cancel', array('class' => 'btn btn-primary btn-md'))}}	
				</div>			

			</div>
			{{Form::close()}}
			</div>
		</div>

	<script>
		
		var app = angular.module('editu',[]);
		app.controller('updateUser',['$scope', function($scope){
				var scope = {};
	//			$scope.user = User.get({ id: 0 });
				$scope.user = {
					fid : "{{ Auth::user()->id}}",
					first_name : "{{Auth::user()->first_name}}",
					last_name : "{{Auth::user()->last_name}}",
					email : "{{Auth::user()->email}}"
				}
	//			alert(JSON.stringify(scope));


	/*				$scope.submitForm = function(isValid) {

						// check to make sure the form is completely valid
						if (isValid) { 
							alert('our form is amazing');
						}
		
					}; */
	/*			this.submit = function(user, validity){
					if(validity){
						alert('submitting: '+JSON.stringify(formData));
					}
				} */
		}]);

		
	</script>





@endsection	
