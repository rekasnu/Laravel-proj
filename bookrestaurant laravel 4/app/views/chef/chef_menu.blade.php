@extends('restaurant.index')

@section('content')
<script> var activeTab = null; </script>
<div data-ng-app='validate'>

	<div class='panel'>

		<ul class='nav nav-tabs' id='menu_tab'>

			@if($categories != null)
				<?php $i = 0; ?>
				@foreach($categories as $k)
				
						@if($i == 0)
						<li class="active">{{HTML::link('#'.str_replace(' ', '_', $k->category).'',$k->category,array('id' =>str_replace(' ', '_', $k->category).'s','name' =>str_replace(' ', '_', $k->category)))}}</li>
						@else
						<li>{{HTML::link('#'.str_replace(' ', '_', $k->category).'',$k->category,array('id' =>str_replace(' ', '_', $k->category).'s','name' =>str_replace(' ', '_', $k->category)))}}</li>
						@endif
					<?php $i = $i+1; ?>
				
				@endforeach
				@if($i ==0)
						<h4>You haven't created menu</h4>
				@endif
			@endif
	
		</ul>
		<div class="tab-content" id='tab-content'>
			@if($categories != null)
			<?php $i = 0; ?>
			@foreach($categories as $k)
			@if($i ==0)

				@if(Session::has('categ'))
					<script>var activeTab ='{{ str_replace(' ', '_', Session::get('categ')) }}'; </script>
				@else
					<script>var activeTab ='{{ str_replace(' ', '_', $k->category) }}'; </script>
				@endif
					<script> var x = localStorage.getItem("categ");
								if(x !== null){
									var activeTab = x;
								}
							localStorage.removeItem("categ");
					</script>
				<div class="tab-pane fade in active" id="{{ str_replace(' ', '_', $k->category) }}" >
			@else
				<div class="tab-pane fade" id="{{ str_replace(' ', '_', $k->category) }}" >
			@endif
				<h2>{{$k->category}}</h2>
				<table class="table text-left" id="{{str_replace(' ', '_', $k->category)}}_table">
					<tr class='info'>
						<th>No.</th>
						<th>Dish name</th>
						<th>Description</th>
						<th>Price</th>
						<th></th>
					</tr>
						<?php $no = 1; ?>
						@foreach($items as $it)
							@if($k->category_id == $it->category_id)
								<tr id="a{{$it->id}}">
									<td>{{$no}}</td>
									<td>{{$it->dish_name}}</td>
									<td>{{$it->description}}</td>
									<td>{{$it->price}}</td>
									<td><a id='{{$it->id}}' onclick='if(!window.confirm("Do you realy want to delete ?"))return false;adelete(this.id)'><img class="ico1" src="Images/trash_recyclebin_empty_closed.png" alt="Delete file"></a></td>
									<td><a href="edit?code={{ $it->id}}"><img class="ico" src="Images/edit-icon.png" alt="Edit"></a></td>
								</tr>
								<?php $no++; ?>
							@endif
						@endforeach
					
				</table>
			</div>
			<?php $i = $i+1; ?>
			@endforeach
			@endif

		<div class="row text-center">
			{{Form::button('Add tab', array('class'=>'btn btn-primary','type'=>'button','onclick'=>'addTab()'))}}
			{{Form::button('Remove tab', array('class'=>'btn btn-primary','type'=>'button','onclick'=>'removeTab()'))}}
			{{Form::button('Add entry', array('id'=>'adad','class'=>'btn btn-primary','type'=>'button','onclick'=>'addEntry()'))}}
		</div>
	</div>
<div class="modal fade midn" id='aa' role="dialog" aria-hidden="true">
	<div class="modal-dialog mid menup">
		<div class="modal-content vm text-left" data-ng-controller='one'>
			{{Form::open(array('url'=>'tab_save', 'name'=>'lo', 'id'=>'dati', 'novalidate' =>'novalidate','onsubmit'=>'addTab();'))}}
				<div class="modal-header">
					{{Form::button('x', array('type'=>'button', 'class'=>'close', 'data-dismiss'=>'modal', 'aria-hidden'=>'true'))}}
					<h4 class="modal-title" id="rt">Please enter new tabs name</h4>
				</div>
				<div class="modal-body p15">
					
					<div class="form-group">
						{{Form::label('input','Tab name : ', array('class'=>'control-label'))}}
						{{Form::text('category', '', array('id'=>'inp','data-ng-model' =>'item.category','class'=>'form-control input-md', 'data-ng-minlength' =>'2', 'data-ng-maxlength' => '20' , 'data-ng-pattern'=>'/^[a-zA-Z\s]*$/','required') )}}
					<div class="error" 
				        data-ng-show="lo.category.$invalid">
				    <small class="error" 
					        data-ng-if="lo.category.$error.required && lo.category.$dirty">
					        Your name is required.
				    </small>
				    <small class="error" 
				            data-ng-if="lo.category.$error.minlength && lo.category.$dirty">
				            Your name is required to be at least 2 characters long
				    </small>
				    <small class="error" 
				            data-ng-if="lo.category.$error.pattern && lo.category.$dirty">
				            Your name cannot contain spaces and special characters
				    </small>
				    <small class="error" 
				            data-ng-if="lo.category.$error.maxlength && lo.category.$dirty">
				            Your name cannot be longer than 20 characters
				    </small>
					</div>
					
					</div>

				</div>
				<div class="modal-footer">
					{{Form::button('Ok', array('type'=>'submit', 'id'=>'enter' ,'class'=>'btn btn-primary', 'data-ng-disabled'=>'lo.$invalid || !lo.category.$dirty', 'aria-hidden'=>'true'))}}
					{{Form::button('Close', array('type'=>'button', 'class'=>'btn btn-default text-right', 'data-dismiss'=>'modal'))}}
				</div>
			{{Form::close()}}
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade midn" id='aa1' role="dialog" aria-hidden="true">
	<div class="modal-dialog mid menup">
		<div class="modal-content vm text-left" data-ng-controller='two'>
			{{Form::open(array('url'=>'save_dish', 'name'=>'lo1', 'id'=>'dati1', 'novalidate' =>'novalidate', 'onsubmit'=>'addEntry()'))}}
				<div class="modal-header">
					{{Form::button('x', array('type'=>'button', 'class'=>'close', 'data-dismiss'=>'modal', 'aria-hidden'=>'true'))}}
					<h4 class="modal-title">Please enter dish</h4>
				</div>
				<div class="modal-body p15">
					
					<div class="form-group">
						{{Form::label('input','Dish name : ', array('class'=>'control-label'))}}
						{{Form::text('dish_name', '', array('id'=>'inp1','data-ng-model' =>'item.dish_name','class'=>'form-control input-md', 'data-ng-minlength' =>'5', 'data-ng-maxlength' => '100' , 'data-ng-pattern'=>'/^[A-za-z0-9 ]+[_.-]?[A-za-z0-9]+$/i','required') )}}
					<div class="error" 
				        data-ng-show="lo1.dish_name.$invalid">
				    <small class="error" 
					        data-ng-if="lo1.dish_name.$error.required && lo1.dish_name.$dirty">
					        Dish name is required.
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.dish_name.$error.minlength && lo1.dish_name.$dirty">
				            Dish name is required to be at least 5 characters long
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.dish_name.$error.maxlength && lo1.dish_name.$dirty">
				            Dish name cannot be longer than 200 characters
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.dish_name.$error.pattern && lo1.dish_name.$dirty">
				            Dish name cannot contain spaces and special characters
				    </small>
					</div>
					
					</div>

					<div class="form-group">
						{{Form::label('input2','Description : ', array('class'=>'control-label'))}}
						{{Form::textarea('description', '', array('id'=>'inp2','data-ng-model' =>'item.description','class'=>'form-control textfield', 'data-ng-minlength' =>'10', 'data-ng-maxlength' => '200' , 'data-ng-pattern'=>'/^[a-zA-Z0-9,.!? ]*$/','required') )}}
					<div class="error" 
				        data-ng-show="lo1.description.$invalid">
				    <small class="error" 
					        data-ng-if="lo1.description.$error.required && lo1.description.$dirty">
					        Description is required.
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.description.$error.minlength && lo1.description.$dirty">
				            Description is required to be at least 10 characters long
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.description.$error.maxlength && lo1.description.$dirty">
				            Description cannot be longer than 200 characters
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.description.$error.pattern && lo1.description.$dirty">
				            Description cannot contain spaces and special characters
				    </small>
					</div>
					
					</div>

					<div class="form-group">
						{{Form::label('input3','Price : ', array('class'=>'control-label'))}}
						{{Form::text('price', '', array('id'=>'inp3','data-ng-model' =>'item.price','class'=>'form-control textfield', 'data-ng-minlength' =>'4', 'data-ng-maxlength' => '6' , 'data-ng-pattern'=>'/^\d{0,3}[.]\d{0,2}/i','required') )}}
					<div class="error" 
				        data-ng-show="lo1.price.$invalid">
				    <small class="error" 
					        data-ng-if="lo1.price.$error.required && lo1.price.$dirty">
					        Price is required.
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.price.$error.minlength && lo1.price.$dirty">
				            Price should be in format 0.00 and less than 999.99!!!
				    </small>
				    <small class="error" 
				            data-ng-if="lo1.price.$error.maxlength && lo1.price.$dirty">
				            Highest available price 999.99 !!!
				    </small>
				    <small class="error" 
				            data-ng-if="!lo1.price.$error.maxlength && !lo1.price.$error.minlength && lo1.price.$error.pattern && lo1.price.$dirty">
				            Price should be a digits in format 0.00 and less than 999.99!!!
				    </small>
					</div>
					
					</div>
						{{Form::hidden('category','activeTab',array('id'=>'categ','data-ng-value'=>''))}}
				</div>
				<div class="modal-footer">
					{{Form::button('Ok', array('type'=>'submit', 'id'=>'enter1' ,'class'=>'btn btn-primary', 'data-ng-disabled'=>'lo1.$invalid || !lo1.dish_name.$dirty && !lo1.description.$dirty && !lo1.price.$dirty', 'aria-hidden'=>'true'))}}
					{{Form::button('Close', array('type'=>'button', 'class'=>'btn btn-default text-right', 'data-dismiss'=>'modal'))}}
				</div>
			{{Form::close()}}
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<script>
	//var activeTab = null;


	$(document).ready(function(){ 

		if(activeTab !== null){
			$('#adad').show();
		}else{
			$('#adad').hide();
		}
		$('.nav-tabs a[href="#' + activeTab + '"]').tab('show');
		$("#menu_tab a").click(function(e){
			e.preventDefault();
			$(this).tab('show');
			activeTab = e.target.name;
		//	console.log(activeTab);
		//	alert(activeTab.replace(/\_/g,' '));
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
	var link = "<?php echo Request::root(); ?>/";
	function removeTab(){

		$('#aa1').data('modal', null);
		$("#aa").modal('show');
		var link = "<?php echo Request::root(); ?>/";
		var newlink = link+'remove_tab';
		document.lo.action = newlink;
		document.getElementById('rt').innerHTML = 'Please enter tabs name to remove';

		//   X-CSRF-Token': $('input[name="_token"]').val()
		
		//$('#newPost :submit').click(function(e){
		//    var url = 'remove_tab';
		  //  e.preventDefault();
		 //   $.post(url, {
		  //      'category' : activeTab
		   //     }
		        //, function(data) {
		        //$('#content').prepend('<p>' + data + '</p>');
		    //}
		  //  );
		//});
	//	$.ajax({ url: 'remove_tab',
	//	 type: 'POST',
	//	 beforeSend: function(xhr) {xhr.setRequestHeader('X-CSRF-Token', '#{form_authenticity_token}')},
	//	 dataType: "json",
		// data: 'some_uri=' + response.data.uri ,
	//	 success: function(response) {
	//	 	  var newlink = link+'remove_tab';
	//	      window.location.href = newlink;
	//	  }
	//	});
	}



	function addTab(){
		$('#aa1').data('modal', null);
		$("#aa").modal('show');
		$('#enter').on('click',function (e){
			var tab = document.getElementById('inp').value;
			var tab = String.trim(tab);
			var idid = tab.replace(/\ /g,'_');
			document.getElementById('inp').value = tab;
		/*	var li = '<div class="tab-pane fade" id="'+idid+'"></div>';
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
		*/	/*var toke = document.getElementsByName('_token').value;
			alert(toke);
			var dataString = 'tab='+idid+'&token='+_token; 
			$.ajax({
                    type: "POST",
                    url : "tab_save",
                    data : dataString,
                    success : function(data){
                        console.log(data);
                    }
                },"json");
				*/
			$("#menu_tab a").click(function(e){
				e.preventDefault(); 
				$(this).tab('show');
			});
		});

	}

	function adelete(tt){
			var refer = tt;
			$.ajax({
                    type: "POST",
                    url : "remove",
                    beforeSend: function(xhr) {xhr.setRequestHeader('X-CSRF-Token', $('input[name="_token"]').val())},
                    data : { 'id' : refer,
                    		  'categ' :  'asasasas' },
                    success : function(data){
     //               	console.log(data);
                    //	sessionStorage.setItem("categ", data.categ);
	//		$('#msg').modal('toggle');
                  //  var ad =document.getElementById(data.item);
                  //  alert(ad);
                  //  document.getElementById(data.id).innerHTML = "";
    //               $("#a"+data.item).remove(); 
    //				$.post('chef_menu', { 'cated' : 'data.categ', 'namek' : 'data.namek'});
    //				sessionStorage.setItem("categ", data.categ);
    				localStorage.setItem("categ", data.categ);
                       location.reload(); 
                    }
                },"json");
	}



// $.ajax({
//        url: 'somewhere',
 //       data: {message: 'Hello!', _token: $('input[name=_token]').val()}
//    });



	function addEntry(){
		$("#aa1").modal('show');
	
		document.getElementById('categ').value = activeTab.replace(/\_/g,' ');
		$('#enter1').click(function (){
			var tab = document.getElementById('inp1').value;
			var tab = String.trim(tab);
			document.getElementById('inp1').value = tab;
			var tab1 = document.getElementById('inp2').value;
			var tab1 = String.trim(tab1);
			document.getElementById('inp2').value = tab1;
			var tab3 = document.getElementById('inp3').value;
			var tab3 = String.trim(tab3);
			document.getElementById('inp3').value = tab3;
		//	var ak = activeTab+"_table";
		//	document.lo1.category = activeTab.replace(/\_/g,' ');
		//	document.getElementById('categ').value = activeTab.replace(/\_/g,' ');
			});
		//jQuery.removeData( null);
		//$('#aa1').data('modal', null);
	//	if(activeTab === null){
	//		alert('Please select tab befor clicking on add entry');
	//	}else{
			//dothis()
	//		alert(activeTab);
	//	}
		
		//	alert(activeTab);
		//	var row = "<tr><td>1</td><td>"+tab+"</td><td>"+tab3+"</td></tr><tr><td></td><td>"+tab1+"</td><td></td></tr>";
		//	var row = "<tr><td>"+tab1+"</td><td>"+tab+"</td><td>"+tab3+"</td></tr>";
		//	$('#'+ak).val('');
		//	var tactive = document.getElementById(ak);
		//	$('#'+ak).append(row);
		//	var li = '<div class="tab-pane fade" id="'+idid+'"></div>';
		//	$('#tab-content').append(li);
		//	var li = "<h2>"+tab+"</h2>";
		//	$('#'+idid).append(li);
		//	var li =  '<li><a href="#'+idid+'">'+tab+'</a></li>';
		//	$('#menu_tab').append(li);
		//	$('#inp1').val('');
		//	$('#inp2').val('');
		//	$('#inp3').val('');

		//	$( "#aa1" ).modal('hide');
		//	$("#menu_tab a").click(function(e){
		//		e.preventDefault();
		//	$(this).tab('show');
		//	});
			//$('#'+activeTab).tab('show');
	}

	


</script>
@endsection