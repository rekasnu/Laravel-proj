@extends('restaurant.index')
@section('content')

{{Form::open(array('url' => 'save_rest_profile','enctype'=>'multipart/form-data'))}}
	<table class="mid">
		<tr>
			<td class="text-left">{{Form::label('','Restaurant Name', array('class'=>'reg-text'))}}</td>
			<td class="pad2">{{Form::text('rest_name','',array('class'=>'form-control input-md'))}}</td>
		</tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr>
			<td class="text-left">{{Form::label('','Restaurant image', array('class'=>'reg-text'))}}</td>
			<td class="pad2">{{Form::file('imagea','',array('class'=>'form-control input-md'))}}</td>
		</tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr>
			<td class="text-left">{{Form::label('','Restaurant Description', array('class'=>'reg-text'))}}</td>
			<td class="pad2">{{Form::textarea('description','',array('class'=>'form-control', 'rows'=>'5'))}}</td>
		</tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr>	
			<td class="text-left">{{Form::label('','City', array('class'=>'reg-text'))}}</td>
			<td class="pad2">{{Form::text('city','',array('class'=>'form-control input-md'))}}</td>
		</tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr>	
			<td class="text-left">{{Form::label('','Country', array('class'=>'reg-text'))}}</td>
			<td class="pad2">{{Form::text('country','',array('class'=>'form-control input-md'))}}</td>
		</tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr>
			<td>{{ Form::submit('Submit', array('data-ng-disabled'=>'lo.$invalid && !lo.dirty','class'=>'btn btn-success btn-lg')) }}</td>
			<td>{{ HTML::link('owner_home', 'Cancel', array('class'=>'btn btn-primary btn-lg')) }}</td>
		</tr>
	</table>
{{Form::close()}}


@endsection