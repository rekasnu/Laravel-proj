<?php namespace App\Http\Middleware;

use Closure;
use App\UserTypes;
use Auth;

use Illuminate\Contracts\Routing\Middleware;

class MainChef implements Middleware {


	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */


	public function handle($request, Closure $next)
	{
		if(Auth::user()){
			if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type != 'chef'){
				return redirect('login');
			}
		}
			return $next($request);
		
	}

}
