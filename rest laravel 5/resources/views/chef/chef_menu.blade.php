@extends('restaurant.index')

@section('content')
<div data-ng-app='validate'>
	<h1 class='reg-text'>Hi there</h1>
	<div class='panel'>
		<ul class='nav nav-tabs' id='menu_tab'>
			<li class="active">{!!HTML::link('#special_offers','Special Offers',array('id' =>'special_offerss'))!!}</li>
			<li>{!!HTML::link('#starters','Starters',array('id' =>'starterss'))!!}</li>
			<li>{!!HTML::link('#main_course','Main courses',array('id' =>'main_courses'))!!}</li>
			<li>{!!HTML::link('#drinks','Drinks',array('id' =>'drinkss'))!!}</li>
		</ul>
		<div class="tab-content" id='tab-content'>
			<div class="tab-pane fade in active" id='special_offers'>
				<h2>Special offers</h2>
				<table class="table text-left" id="special_offerss_table">
					<tr class='info'>
						<th>No.</th>
						<th>Description</th>
						<th>Price</th>
					</tr>
				</table>
			</div>
			<div class="tab-pane fade" id='starters'>
				<h2>Pirmais experiments</h2>
				<table class="table text-left" id="starterss_table">
					<tr class='info'>
						<th>No.</th>
						<th>Description</th>
						<th>Price</th>
					</tr>
				</table>
			</div>	
			<div class="tab-pane fade" id='main_course'>
				<h2>Main course</h2>
				<table class="table text-left" id="main_courses_table">
					<tr class='info'>
						<th>No.</th>
						<th>Description</th>
						<th>Price</th>
					</tr>
				</table>
			</div>
			<div class="tab-pane fade" id='drinks'>
				<h2>Drinks</h2>
				<table class="table text-left" id="drinkss_table">
					<tr class='info'>
						<th>No.</th>
						<th>Description</th>
						<th>Price</th>
					</tr>
				</table>
			</div>
		</div>
		<div class="row text-center">
			{!!Form::button('Add tab', array('class'=>'btn btn-primary','type'=>'button','onclick'=>'addTab()'))!!}
			{!!Form::button('Add entry', array('class'=>'btn btn-primary','type'=>'button','onclick'=>'addEntry()'))!!}
		</div>
	</div>
<div class="modal fade midn" id='aa' role="dialog" aria-hidden="true">
	<div class="modal-dialog mid menup">
		<div class="modal-content vm text-left" data-ng-controller='one'>
			{!!Form::open(array('url'=>'#', 'name'=>'lo', 'id'=>'dati', 'novalidate' =>'novalidate'))!!}
				<div class="modal-header">
					{!!Form::button('x', array('type'=>'button', 'class'=>'close', 'data-dismiss'=>'modal', 'aria-hidden'=>'true'))!!}
					<h4 class="modal-title">Please enter new tabs name</h4>
				</div>
				<div class="modal-body p15">
					
					<div class="form-group">
						{!! Form::label('input','Tab name : ', array('class'=>'control-label')) !!}
						{!! Form::text('inp', '', array('id'=>'inp','data-ng-model' =>'item.inp','class'=>'form-control input-md', 'data-ng-minlength' =>'2', 'data-ng-maxlength' => '20' , 'data-ng-pattern'=>'/^[a-z0-9 ]+[_.-]?[a-z0-9]+$/i','required') )!!}
					<div class="error" 
				        data-ng-show="lo.inp.$invalid">
				    <small class="error" 
					        data-ng-if="lo.inp.$error.required && lo.inp.$dirty">
					        Your name is required.
				    </small>
				    <small class="error" 
				            data-ng-if="lo.inp.$error.minlength && lo.inp.$dirty">
				            Your name is required to be at least 2 characters long
				    </small>
				    <small class="error" 
				            data-ng-if="lo.inp.$error.maxlength && lo.inp.$dirty">
				            Your name cannot be longer than 20 characters
				    </small>
				    <small class="error" 
				            data-ng-if="!lo.inp.$error.minlength && lo.inp.$error.pattern">
				            Your name cannot contain spaces and special characters
				    </small>
					</div>
					
					</div>

				</div>
				<div class="modal-footer">
					{!! Form::button('Ok', array('type'=>'button', 'id'=>'enter' ,'class'=>'btn btn-primary', 'data-ng-disabled'=>'lo.$invalid || !lo.inp.$dirty', 'aria-hidden'=>'true'))!!}
					{!! Form::button('Close', array('type'=>'button', 'class'=>'btn btn-default text-right', 'data-dismiss'=>'modal'))!!}
				</div>
			{!! Form::close() !!}
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade midn" id='aa1' role="dialog" aria-hidden="true">
	<div class="modal-dialog mid menup">
		<div class="modal-content vm text-left" data-ng-controller='two'>
			{!! Form::open(array('url'=>'#', 'name'=>'lo1', 'id'=>'dati', 'novalidate' =>'novalidate')) !!}
				<div class="modal-header">
					{!! Form::button('x', array('type'=>'button', 'class'=>'close', 'data-dismiss'=>'modal', 'aria-hidden'=>'true'))!!}
					<h4 class="modal-title">Please enter dish</h4>
				</div>
				<div class="modal-body p15">
					
					<div class="form-group">
						{!!Form::label('input','Dish name : ', array('class'=>'control-label'))!!}
						{!!Form::text('inp1', '', array('id'=>'inp1','data-ng-model' =>'item.inp1','class'=>'form-control input-md', 'data-ng-minlength' =>'5', 'data-ng-maxlength' => '100' , 'data-ng-pattern'=>'/^[a-z0-9 ]+[_.-]?[a-z0-9]+$/i','required') )!!}
					<div class="error" 
				        data-ng-show="lo1.inp1.$invalid">
				    <small class="error" 
					        data-ng-if="lo1.inp1.$error.required && lo1.inp1.$dirty">
					        Dish name is required.
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.inp1.$error.minlength && lo1.inp1.$dirty">
				            Dish name is required to be at least 5 characters long
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.inp1.$error.maxlength && lo1.inp1.$dirty">
				            Dish name cannot be longer than 200 characters
				    </small>
				    <small class="error" 
				            data-ng-if="!lo1.inp1.$error.minlength && lo1.inp1.$error.pattern">
				            Dish name cannot contain spaces and special characters
				    </small>
					</div>
					
					</div>

					<div class="form-group">
						{!!Form::label('input2','Description : ', array('class'=>'control-label'))!!}
						{!!Form::textarea('inp2', '', array('id'=>'inp2','data-ng-model' =>'item.inp2','class'=>'form-control textfield', 'data-ng-minlength' =>'10', 'data-ng-maxlength' => '200' , 'data-ng-pattern'=>'/^[a-z0-9 ]+[_.-]?[a-z0-9]+$/i','required') )!!}
					<div class="error" 
				        data-ng-show="lo1.inp2.$invalid">
				    <small class="error" 
					        data-ng-if="lo1.inp2.$error.required && lo1.inp2.$dirty">
					        Description is required.
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.inp2.$error.minlength && lo1.inp2.$dirty">
				            Description is required to be at least 10 characters long
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.inp2.$error.maxlength && lo1.inp2.$dirty">
				            Description cannot be longer than 200 characters
				    </small>
				    <small class="error" 
				            data-ng-if="!lo1.inp2.$error.minlength && lo1.inp2.$error.pattern">
				            Description cannot contain spaces and special characters
				    </small>
					</div>
					
					</div>

					<div class="form-group">
						{!!Form::label('input3','Price : ', array('class'=>'control-label'))!!}
						{!!Form::textarea('inp3', '', array('id'=>'inp3','data-ng-model' =>'item.inp3','class'=>'form-control textfield', 'data-ng-minlength' =>'4', 'data-ng-maxlength' => '6' , 'data-ng-pattern'=>'/^[a-z0-9 ]+[_.-]?[a-z0-9]+$/i','required') )!!}
					<div class="error" 
				        data-ng-show="lo1.inp3.$invalid">
				    <small class="error" 
					        data-ng-if="lo1.inp3.$error.required && lo1.inp3.$dirty">
					        Price is required.
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.inp3.$error.minlength && lo1.inp3.$dirty">
				            Price should be in format 0.00 !!!
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.inp3.$error.maxlength && lo1.inp3.$dirty">
				            Highest available price 999.99 !!!
				    </small>
				    <small class="error" 
				            data-ng-if="!lo1.inp3.$error.minlength && lo1.inp3.$error.pattern">
				            Price containe unacceptable characters
				    </small>
					</div>
					
					</div>

				</div>
				<div class="modal-footer">
					{!! Form::button('Ok', array('type'=>'button', 'id'=>'enter1' ,'class'=>'btn btn-primary', 'data-ng-disabled'=>'lo1.$invalid || !lo1.inp1.$dirty && !lo1.inp2.$dirty && !lo1.inp3.$dirty', 'aria-hidden'=>'true'))!!}
					{!!Form::button('Close', array('type'=>'button', 'class'=>'btn btn-default text-right', 'data-dismiss'=>'modal'))!!}
				</div>
			{!!Form::close()!!}
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<script>
	var activeTab = 'special_offerss';

	$(document).ready(function(){ 

		$("#menu_tab a").click(function(e){
			e.preventDefault();
			$(this).tab('show');
			activeTab = e.target.id;
		//	console.log(activeTab);
		//	alert(activeTab);
		});
	});

	var app = angular.module('validate', []);

		app.controller('one', function($scope) {
			var scope = {}
		});

		app.controller('two', function($scope) {
			var scope = {}
		});

//	$("#menu_tab a").on('hidden.bs.modal', function () {
//   		 $(this).data('bs.modal', null);
//	});

	function addTab(){
		$('#aa1').data('modal', null);
		$("#aa").modal('show');
		$('#enter').on('click',function (){
			var tab = document.getElementById('inp').value;
			var tab = String.trim(tab);
			var idid = tab.replace(/\ /g,'_');
			var li = '<div class="tab-pane fade" id="'+idid+'"></div>';
			var ta = '<table class="table text-left" id="'+idid+'s_table"> \
							<tr class="info"> \
								<th>No.</th> \
								<th>Description</th> \
								<th>Price</th> \
							</tr> \
						</table>';
			$('#tab-content').append(li);
			var li = "<h2>"+tab+"</h2>";
			$('#'+idid).append(li);
			$('#'+idid).append(ta);
			var lc =  '<li><a href="#'+idid+'" id="'+idid+'s">'+tab+'</a></li>';
			$('#menu_tab').append(lc);
			$('#inp').val('');
			$( "#aa" ).modal('hide');
		
			$("#menu_tab a").click(function(e){
				e.preventDefault(); 
				$(this).tab('show');
			});
		});

	}

	function addEntry(){
		//jQuery.removeData( null);
		//$('#aa1').data('modal', null);
		$("#aa1").modal('show');
		$('#enter1').click(function (){
			var tab = document.getElementById('inp1').value;
			var tab = String.trim(tab);
			var tab1 = document.getElementById('inp2').value;
			var tab1 = String.trim(tab1);
			var tab3 = document.getElementById('inp3').value;
			var tab3 = String.trim(tab3);
			var ak = activeTab+"_table";
		//	var row = "<tr><td>1</td><td>"+tab+"</td><td>"+tab3+"</td></tr><tr><td></td><td>"+tab1+"</td><td></td></tr>";
			var row = "<tr><td>"+tab1+"</td><td>"+tab+"</td><td>"+tab3+"</td></tr>";
		//	$('#'+ak).val('');
		//	var tactive = document.getElementById(ak);
			$('#'+ak).append(row);
		//	var li = '<div class="tab-pane fade" id="'+idid+'"></div>';
		//	$('#tab-content').append(li);
		//	var li = "<h2>"+tab+"</h2>";
		//	$('#'+idid).append(li);
		//	var li =  '<li><a href="#'+idid+'">'+tab+'</a></li>';
		//	$('#menu_tab').append(li);
			$('#inp1').val('');
			$('#inp2').val('');
			$('#inp3').val('');

			$( "#aa1" ).modal('hide');
		//	$("#menu_tab a").click(function(e){
		//		e.preventDefault();
			$(this).tab('show');
		//	});
			//$('#'+activeTab).tab('show');

		});

	}


</script>
@endsection