		<div class="navbar">

			<div class="nav">
				@if(Auth::user())

					@if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'owner')
						<ul class="nav pull-left">
							<li>{{ HTML::link('owner_home', 'Home', array('class'=>'nav pull-right')) }}</li>
						</ul>
					@endif
					@if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'chef')
						<ul class="nav pull-left">
							<li>{{ HTML::link('chef', 'Home', array('class'=>'nav pull-right')) }}</li>
						</ul>
					@endif
				@endif


				<ul class="nav pull-left">
					<li>{{ HTML::link('/', 'Main', array('class'=>'nav pull-right')) }}</li>
				</ul> 
				
				<ul class="nav pull-right">
					@if(Auth::user())
					<li>{{ HTML::link('logout','Logout', array('class'=>'nav pull-right')) }}</li>
					@else
					<li>{{ HTML::link('login','Login', array('class'=>'nav pull-right')) }}</li>
					@endif
				</ul>
				

				@if(Auth::user())
					@if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type != 'chef')
					<div >
						<ul class="nav pull-right">
							<li>
								<a data-toggle="dropdown" class=" nav pull-righ" data-ng-mouseenter="status.isopen = true" data-ng-mouseleave="status.isopen = false" >Welcome {{ Auth::user()->first_name }}</a>
							
								<ul class="dropdown-menu pad1">
					                <li><a href="edit">Edit profile</a></li>
					                <li><a href="#">My orders</a></li>
					                <li><a href="#">Sent Items</a></li>
					                <li class="divider"></li>
					                <li><a href="#">Trash</a></li>
					            </ul>
					        </li>

						</ul>
					</div>
					@endif
				@else
				<ul class="nav pull-right pad">
					<li>{{ HTML::link('user_register','Register', array('class'=>'nav pull-right')) }}</li>

				</ul>
				@endif
				

			</div>
		</div>