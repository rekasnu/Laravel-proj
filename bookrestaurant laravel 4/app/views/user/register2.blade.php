@extends('restaurant.index')

@section('content')

<div class="register-response">
	<div class="well">
		<h2>Registered successfully</h2>
		<table class="table table-condensed">
			<tr><th> First Name  </th><td>{{ $f_name }}</td></tr>
			<tr><th> Last Name  </th><td>{{ $l_name }}</td></tr>
			<tr><th> Login Name  </th><td>{{ $d_name }}</td></tr>
			<tr><th> Email </th><td>{{ $email }}</td></tr>
			<tr><th> User </th><td>{{ $user }}</td></tr>
			<tr><td colspan="2">{{ $msg }}</td></tr>
		</table>
	</div>	
</div>

@endsection