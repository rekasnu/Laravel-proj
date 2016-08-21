<!DOCKTYPE html>
<html data-ng-app="">
	<body>
		<head>
			<title>Angular directives and data binding</title>
		</head>
		<script src="css/js/angular.js"></script>
		Name : <br />
		<input type="text" data-ng-model="name" /><% name %>
		 <br />
		<div class="container" data-ng-model="names=['Dave','Napur','Hary']">
			<h3>Looping with the ng repeat Directive</h3>
			<ul>
				<li data-ng-repeat="person in names "><% person %></li>
			</ul>
		</div>
				<?php// if($as){ 
//var_dump($as);
		   //   foreach( $as as $s){
		   //   	echo $s->symbol_id.'  aaa  '.$s->recipe_id.'<br>';
		  //    	} 
		  //   } ?>
	</body>
</html>