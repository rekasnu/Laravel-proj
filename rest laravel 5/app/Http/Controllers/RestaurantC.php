<?php namespace App\Http\Controllers;
use View;
use App\Ruser;
use App\UserTypes;
use Input;
use Auth;
use App\Http\Request;
use App\Http\Controllers\Controller;
Use Redirect;
use Session;
use Cache;
use DB;
use Validator;
use App\AssignedStatus;
use App\Dati;
use App\Task;
use App\Status;
//use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as httpRequest;



class RestaurantC extends Controller{

	public $restful = true;
//amgular index
	public function get_aindex(){

/*
		$name = ['name'=>'er'];
		$rules = array('name' => 'required|min:4');
		$validation = Validator::make($name,$rules);

		if($validation->fails()){
			return Redirect::to('login')
			->withErrors($validation);
		}

*/if(Input::get('ag')){
		$as['a'] = Input::all();
		dd($as); 
	}
	//	$as = DB::table('recype_symbols')->where('symbol_id',8)->get();
		$as = DB::table('recype_symbols')
				->join(DB::raw('(select *  from recype_symbols where symbol_id = 16 or symbol_id = 8) as b'),'recype_symbols.recipe_id','=','b.recipe_id')
			    	->where('recype_symbols.symbol_id',8)
			    	->where('b.symbol_id',16)
			    	->select(['recype_symbols.recipe_id'])
			    	->get();

		$as1 = DB::table('recype_symbols')
			->join('recype_symbols as b', function($join){
				$join->on('recype_symbols.recipe_id','=','b.recipe_id');
				
			})->where('recype_symbols.symbol_id',8)
			  ->where('b.symbol_id',16)
			  ->select(['recype_symbols.recipe_id'])
			  ->get();
		$b = 16;
		$a = 'none1';
		$as1 = DB::table('recype_symbols')
			->join('recype_symbols as b', function($join) use ($a,$b){
				if($a != 'none'){
				$join->on('recype_symbols.recipe_id','=','b.recipe_id')->where('b.symbol_id','=', $b)
				->orOn('recype_symbols.recipe_id','=','b.recipe_id')->where('b.symbol_id','=',8);
			}})
			  ->where('recype_symbols.symbol_id',8)
			  ->whereRaw('b.symbol_id = ?',[$b])
			  ->select(['recype_symbols.id','recype_symbols.recipe_id','b.symbol_id',DB::raw('recype_symbols.symbol_id * 3 as c ')])
			  ->get();
//		$as = DB::table('recype_symbols')
//				->insert(array('symbol_id'=>'20' , 'recipe_id' => '150'));

//		$as = DB::connection()->getPdo()->lastInsertId();
		$ak1 =  DB::table('recype_symbols')
				->select('recipe_id', DB::raw('(symbol_id * ?) as c'))
				->setBindings([$b])
				->get();
		$ak = AssignedStatus::with(['status','taskprogress'])
						        ->join('task_progresses as tp',function($join){
						            $join->on('assigned_statuses.project_id','=','tp.project_id')->where('assigned_statuses.project_id','=','3');        
						            })
						        ->join('statuses as s', function($join){
						                $join->on('tp.assigned_status_id','=','s.id');	                	
						                })
						        ->whereRaw('tp.updated_at = (select max(updated_at) from task_progresses where tp.task_id = task_id)')
								->orderBy('tp.updated_at','desc')
								->groupBy('tp.task_id')				
						      //  ->select(['assigned_statuses.*','tp.task_id','tp.updated_at as task_updated_at','tp.assigned_status_id','s.name'])
						   		->select(['assigned_statuses.*'])
						        ->get();

		$ass = httpRequest::server('SERVER_ADDR');
		$ass = httpRequest::server('REMOTE_ADDR');	
		$as1 = DB::table('recype_symbols')
			->join('recype_symbols as b', function($join) use ($a,$b){
				if($a != 'none'){
				$join->on('recype_symbols.recipe_id','=','b.recipe_id')->where('b.symbol_id','=', $b)
				->orOn('recype_symbols.recipe_id','=','b.recipe_id')->where('b.symbol_id','=',8);
			}})
			  ->where('recype_symbols.symbol_id',8)
			  ->whereRaw('b.symbol_id = ?',[$b])
			  ->select(['recype_symbols.id','recype_symbols.recipe_id','b.symbol_id',DB::raw('recype_symbols.symbol_id * 3 as c ')])
			  ->get();
			//  ->lists('recype_symbols.id');
//	$ass = Request::getClientIp();	
//dd($ak);
		/*	  $ak = AssignedStatus::with(['status'=>function($query){
			  	$query->whereIn('id',[1,4]);
			  }])->get()->toArray();
						      dd($ak);
*/	/*	with(['status','taskprogress'])
            ->where('assigned_statuses.project_id',3)
            ->orderBy('task_progresses.id','desc')
            ->select(['task_progresses.id','task_progresses.assigned_status_id','statuses.name'])
            ->first();
*/

/*
				
				$first = DB::table('recype_symbols')
                           ->where('symbol_id', 8);
$as = DB::table('recype_symbols')->where('symbol_id', 16)
                           ->unionAll($first)
               //            ->groupBy('recipe_id')
                //           ->having('count(*)>2')
                //           ->select(['recipe_id'])
                           ->get(); */
          //                 $as1 = [];
       //            $filesInFolder = \File::allFiles('fonts');
         //          foreach($filesInFolder as $path)
			//				{
			//				    $as1[] = (string)$path;
			//				}
				$seven_days_ago_start = date(('Y-m-d'), strtotime('-7 days')) . ' 00:00:01';
				$seven_days_ago_end = '2015-08-05 15:14:38';
			//	$as = date('H:i:s',strtotime('06:30:00'));
			//	dd($as);
		//	dd($as1);
/*
DB::table('tags')
            ->leftJoin('tags as t', function($join) use ($seven_days_ago_end){
                $join->on('tags.user_id','=','t.user_id')->where('t.expiry_date','>',$seven_days_ago_end);
            })
            ->join('users', function($join){
                $join->on('tags.user_id', '=', 'users.id')
                })
            ->leftJoin('pets', 'pets.id', '=', 'tags.pet_id')
            ->where('tags.active', '=', 1)
            ->whereBetween('tags.expiry_date', array($seven_days_ago_start, $seven_days_ago_end))
            ->select('users.id', 'users.username', 'users.email', 'users.first_name', 'tags.serial_number')
            ->get();
*/
   /*         $as1 = DB::table('tags')
            ->leftJoin('tags as t', function($join) use ($seven_days_ago_end){
                $join->on('tags.user_id','=','t.user_id')->where('t.created_at','>',$seven_days_ago_end);
            })
           ->join('users', function($join){
                $join->on('tags.user_id', '=', 'users.id')->whereNull('t.created_at');
                })
           ->whereBetween('tags.created_at', array($seven_days_ago_start, $seven_days_ago_end))
           ->select(['tags.id'])
            ->get();
*/

  $list = DB::table('tags')
  ->join('tags as t', function($join){
                $join->on('tags.user_id','=','t.user_id');
            })
  			->groupBy(DB::raw('YEAR(t.created_at)'))
            ->groupBy(DB::raw('MONTH(t.created_at)'))
  			->select(DB::raw('YEAR(t.created_at)'))->get();
//dd($as1);
  	//	$ak = AssignedStatus::all('project_id', 'id');
  	//	$ak = AssignedStatus::get();
	//	$az = AssignedStatus::withAdminAll(); 
  	//	dd($ak,$az);


		return View::make('/angularz/index')
				->with('as', $as1)
				->with('ak', $ak);
		//		return "Hello";
	}

	public function get_index(){
		/*		Mail::send('emails.auth.test', array('name' => 'ER'), function($message)
		 {
				$message->to('as1nektars@gmail.com', 'Go home')->subject('test email');
		});
		*/
		$title = "Main";
		return View::make('plugins.main')
		->with('title', $title)
		->with('main', Ruser::all());
	} 

	public function get_login(){
		$title = "Login";
		return View::make('user.login')
		->with('title', $title);
	}

	public function get_logout(){

		Auth::logout();
        Session::flush();
		return Redirect::to('')
			->with('namek', 'You have been loged off successfully.');


	}

	public function get_main(){
		$title = "Main";
		return View::make('plugins.main')
		->with('title', $title);
	}

	public function post_login(){

		$title = "Login resp";
		$validation = Ruser::validatel(Input::all());

		if($validation->fails()){
			return Redirect::to('login')
			->withErrors($validation);
		}else{
			
			$auth = Auth::attempt(array(
					'login_name' => Input::get('login_name'),
					'password' => Input::get('password'),
					'active' => 1
				));
			
			if($auth){
				$type = UserTypes::where('user_id','=',Auth::user()->id)->first()->type;
				if($type == 'chef'){
			
					return Redirect::to('chef');
					
				}else{
					return Redirect::to('');
				}
				

			}
			else{
				return Redirect::to('login')
				->with('namek', 'Email/password is wrong or account is not activated!!!');
			}
		
		}
	}

	public function get_search(){
		$validation = Ruser::validateloc(Input::all());

		if($validation->fails()){
			return Redirect::to('')
			->withErrors($validation);
		}
		else{
			$title = "Search results";
			$view = View::make('restaurant.search_results')
			->with('title', $title);
			$view['location'] = Input::get('location');
			return $view;
		}

	}

}