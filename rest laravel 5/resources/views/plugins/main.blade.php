@extends('restaurant.index')

@section('content')

<!--		<lu>
				@foreach($main as $user)
					<li>{{ $user->f_name }}</li>
					<li>{{ $user->l_name }}</li>
				@endforeach
			</lu>
	-->
		<div>
		<div class="t2">
			<div class="span4 offset4">
				<div class="well">
				<legend>Restaurant search </legend>
				{!! Form::open(array('url' => 'search_results', 'method' => 'GET')) !!}
				<label for="username" class="control-label">Please enter your location : </label>
				{!! Form::text('location', '', array('class'=>'span3', 'placeholder'=>'Location')) !!}
				{!! Form::submit('Search', array('class'=>'btn btn-success')) !!}
				{!! Form::close() !!}
				</div>	
			</div>
		</div>
		
		<div class="t1">
			 <div class="t1 row">
	    
	                <div class="col-lg-12 text-center">
	                    <div id="carousel-example-generic" class="carousel slide">
	                        <!-- Indicators -->
	                        <ol class="carousel-indicators hidden-xs">
	                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
	                            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
	                 
	                        </ol>

	                        <!-- Wrapper for slides -->
	                        <div class="carousel-inner">
	                            <div class="item active">
	                                <img class="img-responsive img-full" src="images/slide-1.jpg" alt="">
	                            </div>
	                            <div class="item">
	                                <img class="img-responsive img-full" src="images/slide-2.jpg" alt="">
	                            </div>
	                            <div class="item">
	                                <img class="img-responsive img-full" src="images/slide-3.jpg" alt="">
	                            </div>
	                            <div class="item">
	                                <img class="img-responsive img-full" src="images/slide-4.jpg" alt="">
	                            </div>
	                            <div class="item">
	                                <img class="img-responsive img-full" src="images/slide-5.jpg" alt="">
	                            </div>
	                        </div>

	                        <!-- Controls -->
	                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
	                            <span class="icon-prev"></span>
	                        </a>
	                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
	                            <span class="icon-next"></span>
	                        </a>
	                    </div>
	                    
	                </div>
	           
	        </div>
	    </div>
    
@endsection
