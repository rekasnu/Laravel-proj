<h1> Hello ,</h1><br><br>
This is password reset link <br><br>
Please click on the link if you wish tp proceed:<br><br>
If you did not request password reset pleas ignor. <br><br>

Reset password:<br><br>
-------------<br>
<a href="<?php echo $link;?>"> {{ $link }} </a><br>

{{ Form::open(array('url' => $link)) }}
 <table>
  <tr><td>{{ Form::label('l_name', 'Login name') }}</td>
  <td>{{ Form::text('login_name') }}</td></tr>
 
  <tr><td>{{ Form::label('password', 'Password') }}</td>
  <td>{{ Form::password('password') }}</td></tr>
 
  <tr><td>{{ Form::label('password_confirmation', 'Password confirm') }}</td>
  <td>{{ Form::password('password_confirmation') }}</td></tr>
 
  {{ Form::hidden('code', $code) }}
 
  <tr><td colspan="2">{{ Form::submit('Submit') }}</td></tr>
 </table>
{{ Form::close() }}

-------------