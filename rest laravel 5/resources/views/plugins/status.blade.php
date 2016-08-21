@if(isset($errors) && count($errors -> all()) >0)
<div class="modal fade text-center" id="msg">	
	<div class="modal-body alert alert-danger t mm sxx">
		<div class="well">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h2 class="alert-hedding">Ouch!</h2>
			<ui>
				@foreach ($errors->all('<li class="black">:message</li>') as $message)
				{!! $message !!}
				@endforeach
			</ui>
		</div>
	</div>
</div>
@endif
	
@if (Session::has('namek'))
	<div class="modal fade text-center" id="msg">	
	<div class="modal-body alert alert-success sxx mm">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>	
		<b>{!! Session::get('uname') !!}</b> {!! Session::get('namek')!!} &nbsp; 
	</div>
	</div>
@endif
