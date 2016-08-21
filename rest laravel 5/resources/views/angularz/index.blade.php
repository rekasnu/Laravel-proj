
<html data-ng-app=''>
	<body>
		<head>
			<title>Angular directives and data binding</title>
			<script src="https://code.jquery.com/jquery-2.0.1.js"></script>
		</head>
		<script src="./css/js/angular.js"></script>
		Name : <br />
		<input type="text" data-ng-model="name" /><% name %>
		 <br />
		<div class="container" data-ng-model="names=['Dave','Napur','Hary']">
			<h3>Looping with the ng repeat Directive</h3>
			<ul>
				<li data-ng-repeat="person in names "><% person %></li>
			</ul>
		</div>{!! Form::open(array('url'=>'/','method'=>'GET'))!!}
			{!! Form::text('ag','',array('class'=>'form-control input-md')) !!}
			{!! Form::text('res','',array('class'=>'form-control input-md')) !!}
		    {!! Form::select('res', ['draft' => 'Draft', 'live' => 'Live'],null,['class' => 'form-control']) !!}
		    {!! Form::text('res','',array('class'=>'form-control input-md')) !!}
		    {!! Form::submit('Register', array('class'=>'btn btn-success btn-lg' ))!!}
			{!! Form::close() !!}

			@foreach( $ak as $s)
				<ul>

					<li>{!! $s->status->name !!}</li>		        	        
			       
			        @foreach( $s->taskprogress as $ss)
			        <ul>
			
			        <li>{!! $ss->project_id !!}</li>
			        </ul>
			        @endforeach
			        	
			    </ul>
		    @endforeach
			@include('angularz.as')

<?php if($as){ 
//var_dump($as);
//	print_r($as);
		      foreach( $as as $s){
		      	echo $s->id. '  aaa  '.$s->recipe_id. '  aaa  '.$s->c.' aaa  '.$s->symbol_id.'<br>';
//		   			echo 'aa - '.$s;
		      	} 
		     } 
		     
?>
<?php $az= ["FULL_CONTACT","K1"] ?>
<form>
			@foreach( $az as $s)
				<label class="checkbox">
			        {!! Form::checkbox($s,$s, null) !!} {!! $s!!}
			    </label>
		    @endforeach
		    </form>
<script>
$(document).ready(function(){
	var az = ["FULL_CONTACT", "K1"];
//	$('checkboh').attr('name');
	var azz = $('input[type="checkbox"]');
	azz.prop('checked', false);
//	alert('as');
	$.each(az,function(item, valz){
	//	alert('item1 :'+valz);
		$('input[type="checkbox"]').each(function(){
//			alert('item2 :'+valz);
		//	alert($('input[type="checkbox"]').val());
//			alert('item2 check :'+$(this).val());
			if(valz == $(this).val())
				$(this).prop('checked', true);
			
		//	    this.setAttribute("checked", "checked");
		//		this.checked = true;
	//		else
	//			$(this).prop('checked', false);
			
		
		});

	});
			
});
</script>

	</body>
</html>


<!--
SELECT 
DISTINCT(a.factory_deli_id),a.shop_id,a.entry_date,(a.slip_no) AS FSNo,(s.shop_name) AS FShopName,(i.dress_type_entry) AS FInitItem,(a.item_qty) AS FQty,FORMAT(i.price_rate_max, 2) AS FItemRate,FORMAT(a.item_qty*i.price_rate_max, 2) AS FTot,
b.entry_date,b.shop_id, b.factory_item_id, b.slip_no
FROM delivery_to_shop a 
INNER JOIN init_item_entry i 
ON a.factory_item_id = i.factory_item_id
INNER JOIN shop_name_entry s 
ON a.shop_id = s.shop_id
LEFT JOIN shopdelivery_to_client b
ON a.slip_no = b.slip_no
AND a.factory_item_id = b.factory_item_id 
AND a.shop_id = b.shop_id   -->