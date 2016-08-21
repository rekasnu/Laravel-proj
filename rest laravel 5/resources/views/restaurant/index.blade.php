<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>{!! $title !!}</title>
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
	<style>
		@import url(//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.css);
		@import url(//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-responsive.css); 
	</style>
	{!! HTML::style('css/mans.css') !!} 
	{!! HTML::style('css/default.css') !!} 

	{!! HTML::script('css/js/register.js') !!}
	{!! HTML::script('css/js/main.js') !!}
	{!! HTML::script('css/js/jquery.nivo.slider.js') !!}
	{!! HTML::script('css/js/jquery.nivo.slider.pack.js') !!}

</head>

	@include('plugins.navigate')
	
		@include('plugins.status')
	
	<div class="container text-center">
		@yield('content')

	</div>
	<div class="col-lg-10 ">
    <div class="input-group">
        {!! Form::open(['url'=>'', 'method' => 'GET']) !!}
        {!! Form::text('q', '', [
        'class' => 'form-control',
        'id' =>  'q',
        'placeholder' =>  'i.e. ECE 201, Digital Logic, Kandasamy, or 41045'
        ]) !!}
        <span class="input-group-btn">
            {!! Form::submit('Search', array('class' => 'btn btn-default')) !!}
        </span>
        {!! Form::close() !!}
    </div>
</div>
<!--	<div id="wrapper">
<div class="slider-wrapper theme-default">
<div id="slider" class="nivoSlider"> 
<img src="demo/images/toystory.jpg" data-thumb="../images/toystory.jpg" alt="" /> <a href="http://dev7studios.com"><img src="demo/images/up.jpg" data-thumb="demo/images/up.jpg" alt="" title="This is an example of a caption" /></a> <img src="demo/images/walle.jpg" data-thumb="demo/images/walle.jpg" alt="" data-transition="slideInLeft" /> <img src="demo/images/nemo.jpg" data-thumb="demo/images/nemo.jpg" alt="" title="#htmlcaption" /> </div>
<div id="htmlcaption" class="nivo-html-caption"> <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. </div>
</div>
</div> 
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script> 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> -->
</body>
</html>