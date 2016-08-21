@extends('restaurant.index')

@section('content')
<h1 class="reg-text">{{$date}}  </h1>

<!--foreach($akak as $k){-->
	<p class="reg-text">Ordered items :{{ print_r ($quantity);}}</p>
	<h1 class="reg-text"> {{$id}}  </h1>
	<h1 class="reg-text">{{$user}}</h1>
@endsection



