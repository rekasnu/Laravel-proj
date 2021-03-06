@extends('restaurant.index')

@section('content')

<div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		{{ Form::open(array('url' => 'register2', 'method' => 'POST', 'id' =>'reg-form')) }}
			<h2>User Sign Up <small class="reg-text">It's free and always will be.</small></h2>
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
                        {{ Form::text('first_name', '', array('id'=>'first_name','class'=>'form-control input-lg', 'placeholder'=>'First Name', 'tabindex'=>'1')) }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						{{ Form::text('last_name', '', array('id'=>'last_name','class'=>'form-control input-lg', 'placeholder'=>'Last Name', 'tabindex'=>'2')) }}
					</div>
				</div>
			</div>
			<div class="form-group">
				{{ Form::text('login_name', '', array('id'=>'login_name','class'=>'form-control input-lg', 'placeholder'=>'Login Name', 'tabindex'=>'3')) }}
			</div>
			<div class="form-group">
				{{ Form::text('telephone_no', '', array('id'=>'telephone_no','class'=>'form-control input-lg','maxlength' => 12, 'placeholder'=>'telephone number', 'tabindex'=>'3')) }}
			</div>
			<div class="form-group">
				{{ Form::text('email', '', array('id'=>'email','class'=>'form-control input-lg', 'placeholder'=>'Email Address', 'tabindex'=>'4')) }}
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						{{ Form::radio('user', 'user') }}
						{{ Form::label('User','', array('class' => 'reg-text'))}}
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						{{ Form::radio('user','owner') }}
						{{ Form::label('Busines Owner','', array('class' => 'reg-text'))}}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						{{ Form::password('password', array('id'=>'password','class'=>'form-control input-lg', 'placeholder'=>'Password', 'tabindex'=>'5')) }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						{{ Form::password('password_confirmation', array('id'=>'password_confirmation','class'=>'form-control input-lg', 'placeholder'=>'Confirm Password', 'tabindex'=>'6')) }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4 col-sm-3 col-md-3">
					<span class="button-checkbox">
						{{ Form::button(' I Agree', array('type' =>'button', 'class'=>'btn', 'data-color' =>'info', 'tabindex'=>'7'))}}
						<input type="checkbox" name="terms_and_conditions_I_Agre" id="t_and_c" class="hidden" value="1">
					</span>
				</div>
				<div class="col-xs-8 col-sm-9 col-md-9 reg-text">
					 By clicking <strong class="label label-primary">Register</strong>, you agree to the <a class="terms-text" href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
				</div>
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6">
				{{ Form::submit('Register', array('class'=>'btn btn-primary btn-block btn-lg', 'tabindex'=>'7')) }}
				</div>
				<div class="col-xs-12 col-md-6">
				{{ HTML::link('/', 'Cancel', array('class'=>'btn btn-success btn-block btn-lg')) }}
				</div>
			</div>
		{{ Form::close() }}
	</div>
</div>

<!-- Modal -->
<div class="modal fade text-left" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
			</div>
			<div class="modal-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>




@endsection