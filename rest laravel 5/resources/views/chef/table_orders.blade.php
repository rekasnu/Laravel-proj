@extends('restaurant.index')

@section('content')
	<div class="container-fluid c" id="tt"> 
		<h1 class="reg-text">Table orders</h1>
		<div class="row">
			<div class="col-md-3 col-md-offset-2 pp">
				<a href="#" data-toggle="modal" data-target="#mdialog">{!! Form::button('Table 1', array('id'=>'Order_table_1','onclick'=>'edit(this.id)','class' => 'btn btn-xlarge btn-primary')) !!}</a>
			</div>
			<div class="col-md-3 col-md-offset-2 pp">
				<a href="#" data-toggle="modal" data-target="#mdialog">{!! Form::button('Table 2', array('id'=>'Order_table_2','onclick'=>'edit(this.id)','class' => 'btn btn-xlarge btn-primary')) !!}</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-md-offset-2 pp">
				<a href="#" data-toggle="modal" data-target="#mdialog">{!! Form::button('Table 3', array('id'=>'Order_table_3','onclick'=>'edit(this.id)','class' => 'btn btn-xlarge btn-primary')) !!}</a>
			</div>
			<div class="col-md-3 col-md-offset-2 pp">
				<a href="#" data-toggle="modal" data-target="#mdialog">{!! Form::button('Table 4', array('id'=>'Order_table_4','onclick'=>'edit(this.id)','class' => 'btn btn-xlarge btn-primary')) !!}</a>
			</div>
		</div>


		<div class="row">
			<div class="col-md-3 col-md-offset-2 pp">
				<a href="#" data-toggle="modal" data-target="#mdialog">{!! Form::button('Table 5', array('id'=>'Order_table_5','onclick'=>'edit(this.id)','class' => 'btn btn-xlarge btn-primary')) !!}</a>
			</div>
			<div class="col-md-3 col-md-offset-2 pp">
				<a href="#" data-toggle="modal" data-target="#mdialog">{!! Form::button('Table 6', array('id'=>'Order_table_6','onclick'=>'edit(this.id)','class' => 'btn btn-xlarge btn-primary')) !!}</a>
			</div>
		</div>

	<!-- Modal -->
<div class="modal fade" id="mdialog" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title" id="table">Dialog</h4>
			</div>
			<div class="modal-body">
				<p>Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items </p>
				<p>Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items Order items </p>

			</div>
			<div class="modal-footer">
                <button type="button" class="close" data-dismiss="modal"><h1>OK</h1></button>
			</div>
		</div>
	</div>
</div>

</div>
<script>
	
	function edit(clicked_id){
		var clicked_id = clicked_id.replace(/_/g,' ');
		document.getElementById('table').innerHTML = clicked_id;
	}
</script>
@endsection