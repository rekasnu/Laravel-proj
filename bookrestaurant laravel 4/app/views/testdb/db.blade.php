
<h1> Ermins</h1>
<lu>
	@foreach($db as $user)
		<li>{{ $user->f_name }}</li>
	@endforeach
</lu>