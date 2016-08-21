<?php

class UserEdit extends BaseController {

	public $restful = true;

	public function get_edit(){
				$title="Edit user";
				return View::make('user.edituser')
					->with('title',$title);
	//				->with('userm', Auth::user());
	}

	public function post_saveEdit(){
		try{
		DB::beginTransaction();	
		if(Auth::check()){	 

			$id= $_POST['fid'];
			if(Ruser::find($id)){
				$ak = Ruser::find($id);
//				$ak1 = Ruser::where('email','=', Input::get('email'))->firstOrFail();
				$first_name = trim(Input::get('first_name'));
				$last_name = trim(Input::get('last_name'));
				$email = trim(Input::get('email'));
			
					if($ak->id == $id && $ak->email == Input::get('email')){
						try{
							$edi = Ruser::find($id)->update(array(
								'first_name' => $first_name,
								'last_name' => $last_name,
								'email' => $email
						
						
						));
							}catch(Exception $e){
							DB::rollback();
						}
						DB::commit();
						return Redirect::to('edit')
								->with('namek','User updated successfully');
					}
					else if(Ruser::where('email','=', Input::get('email'))->first()){
						return Redirect::to('edit')
									->with('namek', 'User with this email is already registered !');
					}else{
						try{
							$edi = Ruser::find($id)->update(array(
									'first_name' => Input::get('first_name'),
									'last_name' => Input::get('last_name'),
									'email' => Input::get('email')
								));
						}catch(Exception $e){
							DB::rollback();
						}
						DB::commit();
						return Redirect::to('edit')
							->with('namek','User updated successfully');
		
					}

/*					try {
					    $menus = Ruser::where('email','=', Input::get('email'))->first();
					}catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
					    $message = 'Invalid parent_id.';
					    return Redirect::to('error')->with('message', $message);
					}
*/					
			}else{

				return Redirect::to('edit')
					->with('namek','User updated failed');
			}
		}else{
			return Redirect::to('');	
		}
		}catch(Exception $ex){
				DB::rollback();
				return Redirect::to('edit')
					->with('namek', 'Unexpected error. Please try again');
			}
	}
}