<!DOCTYPE html> 
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>{{ $title }}</title>
	<meta name="viewpoint" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="_token" content="{{ csrf_token() }}" /> 
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<!--	<script language="JavaScript" src="https://www.geoplugin.net/javascript.gp" type="text/javascript"></script> -->

<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.css"> -->
<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-responsive.css">-->
<!--	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
	{{ HTML::style('css/bootstrap334/css/bootstrap.css') }}
	{{ HTML::style('css/bootstrap334/css/bootstrap-theme.css') }}
	{{ HTML::style('css/mans.css') }} 
	{{ HTML::script('css/bootstrap334/js/bootstrap.js') }}
	{{ HTML::script('css/js/angular.js') }}
	{{ HTML::script('css/js/register.js') }}
	{{ HTML::script('css/js/main.js') }}
	{{ HTML::script('css/js/counter.js') }}
	<style type="text/css">
	   .login-form {
    left:0px;
    right:0px;
    width:300px;
    margin:0 auto;
    background-color:#000000;
    padding:60px;
}
	</style>
</head> 
<body> 

	@include('plugins.navigate')
	
		@include('plugins.status')
	
	<div class="container text-center">
		@yield('content')

	</div>
<div>
<!--
<div class="input-group">
<input class="form-control" type="text" placeholder="Enter Your Domain name here..." aria-label="Text input with segmented button dropdown">
<div class="input-group-btn">
<button class="btn btn-default2" type="button">.com</button>
<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
<ul class="dropdown-menu dropdown-menu-left" role="menu">
<li>
<a href="#">.com</a>
</li>
<li>
<a href="#">.in</a>
</li>
<li>
<a href="#">.co</a>
</li>
<li class="divider"></li>
<li>
<a href="#">Separated link</a>
</li>
</ul>
<button class="btn btn-default" type="button">Go</button>
</div>
</div>
</div>
-->

<!--
<li class="dropdown">
                  <a class="dropdown-toggle" href="#" data-toggle="dropdown"> <span class="glyphicon glyphicon-log-in"></span> Login</a>
                  <div class="dropdown-menu" style="padding: 5px; padding-bottom: 5px;">
                  <form  class="login-form" action="[YOUR ACTION]" method="post" accept-charset="UTF-8">
                  <input id="user_username" placeholder="Email" style="margin-bottom: 15px;" type="text" name="user_username" size="30" />
                  <input id="user_password" placeholder="Password" style="margin-bottom: 15px;" type="password" name="user_password" size="30" />
                  <input id="user_remember_me" style="float: left; margin-right: 10px;" type="checkbox" name="user_remember_me" value="1" />
                  <label class="string optional" for="user_remember_me"> Remember me</label>
                  <input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
                  </form>
                  </div>
                </li> -->
</body>
</html>