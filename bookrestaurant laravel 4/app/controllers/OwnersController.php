<?php
use \Input as Input;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;

class OwnersController extends BaseController{

	public function get_ownerhome(){
		try{
		if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'owner'){
			$title = 'Owners Home';

			return View::make('owner.owner_home')
				->with('title', $title);
		}else{
			return Redirect::to('');
		}
		}catch(Exception $ex){
				return Redirect::to('owner_home')
					->with('namek', 'Unexpected error. Please try again');
			}
	}

	public function get_registerChef(){
		try{
		if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'owner'){
			$title = 'Register Chef';

			return View::make('owner.reg_chef')
				->with('title', $title);
		}else{
			return Redirect::to('');
		}
		}catch(Exception $ex){
				return Redirect::to('register_chef')
					->with('namek', 'Unexpected error. Please try again');
			}
	}

	public function post_registerChef2(){
		DB::beginTransaction();
		try{
		if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'owner'){
			$title = 'Register Chef';
			//$input = Input::all();
		//	$restaurant_id = Input::get('rest_id');
		//	$profile = Restaurant::where('restaurant_id','=',$restaurant_id)->first();
	//		if($profile){
	//			$profil_ownwe_id = $profile->owners_id;
		//	}
		//	else if($profil_ownwe_id == Auth::user()->id){
		//	if(Restaurant::where('restaurant_id','=',$restaurant_id)->first()->owners_id == Auth::user()->id){
			//$input = serialize($input);

				$validation = ChefUser::validate(Input::all());
		//		$prof = Restaurant::where('restaurant_id','=',Input::get('restaurant_id'))->first();
				if($validation->fails()){
					return Redirect::to('register_chef')
						->withErrors($validation)
						->with('chef',(object)Input::except('password','password_confirmation'));
					//	->with('chef',$input);
				}
				else{
		//			$profil_ownwe_id = $prof->owners_id;
				try{
					$ruser = new Ruser;

					$ruser->first_name = Input::get('first_name');
					$ruser->last_name = Input::get('last_name');
					$ruser->login_name = Input::get('login_name');
					$ruser->contact_telephone_number = Input::get('telephone_noo');
					$ruser->email = Input::get('email');
					$ruser->password = Hash::make(Input::get('password'));
					$ruser->code = str_random(60);
					$ruser->active = 1;
					$ruser->failed_attempts = 0;
					$ruser->save();
				}catch(Exception $e){
					DB::rollback();
				}
				try{
					$type = new UserTypes;
					$type->user_id = Ruser::where('email','=',Input::get('email'))->first()->id;
					$type->type = 'chef';
					$type->rest_id = DB::table('restaurants')
										->where('rest_name','=',Input::get('rest_name'))
										->where('owners_id','=',Auth::user()->id)->first()->restaurant_id;
					$type->save();
				}catch(Exception $e){
					DB::rollback();
					return Redirect::to('register_chef')
						->with('namek', 'You are not the registered owner of this restaourant')
						->with('chef',(object)Input::except('password','password_confirmation'));
				}
				DB::commit();
					$view = View::make('user.register2')
						->with('title', $title)
						->with('msg', 'Chefs account were created');
					$view['f_name'] = Input::get('first_name');
					$view['l_name'] = Input::get('last_name');
					$view['d_name'] = Input::get('login_name');
					$view['email'] = Input::get('email');
					$view['user'] = 'chef';

					return $view;
				}
			//	else{
			//		return Redirect::to('register_chef')
			//				->withErrors($validation)
			//				->with('chef',(object)Input::except('password','password_confirmation'));
						
			//	}
		}else{
			return Rerirect::to('/');
		}
		}catch(Exception $ex){
			DB::rollback();
				return Redirect::to('register_chef')
					->with('namek', 'Unexpected error. Please try again');
			}
	}

	public function get_createRestProfile(){
		try{
		if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'owner'){
			$title = 'Create Rest Profile';

			return View::make('owner.reg_rest_profile')
				->with('title', $title);
		}else{
			return Redirect::to('/login');
		}
		}catch(Exception $ex){
				return Redirect::to('create_rest_profile')
					->with('namek', 'Unexpected error. Please try again');
			}
	}

	public function post_saveProfile(Request $request){
	//	$s = Request::path();
		dd($request->all());
		DB::beginTransaction();
		try{
		if(UserTypes::where('user_id','=',Auth::user()->id)->first()->type == 'owner'){
			$title = 'Create Rest Profile';
			$validation = Restaurant::validate(Input::all());
			if($validation->fails()){
				return Redirect::to('create_rest_profile')
					->withErrors($validation)
					->withInput(Input::all());
				//	->with('chef',$input);
			}else{
				try{
			//	dd(Input::all());	
$image_data = file_get_contents(Input::file('imagea')->getRealPath());
$type = pathinfo(Input::file('imagea')->getClientOriginalName(), PATHINFO_EXTENSION);
$base64 = base64_encode($image_data);

				if (!file_exists('uploads')) {
					mkdir('uploads', 0777, true);
				}
					$file = Input::file('imagea');
					$image_datas = Input::file('imagea')->getRealPath();
				//	$file->move('uploads', $file->getClientOriginalName());
					$restaurant = new Restaurant;
					$restaurant->rest_name = Input::get('rest_name');
					$restaurant->description = Input::get('description');
					$restaurant->city = Input::get('city');
					$restaurant->country = Input::get('country');
					$restaurant->owners_id = Auth::user()->id;
//					$path = public_path().'\uploads'.'/'.$file->getClientOriginalName();
					$restaurant->picture = $base64;
					$restaurant->image_type = $type;
					$restaurant->save();
				}catch(Exception $e){
					DB::rollback();
				}
				DB::commit();
			return Redirect::to('owner_home')
					->with('namek', 'Restaurant profile has been created');

			}
		}else{
			return Redirect::to('');
		}
		}catch(Exception $ex){
			DB::rollback();
				return Redirect::to('create_rest_profile')
					->with('namek', 'Unexpected error. Please try again');
			}
	}
}