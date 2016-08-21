<?php namespace App;
use Illuminate\Database\Eloquent\Model;
use Status;
class AssignedStatus extends Model {
     protected $table = 'assigned_statuses';
     protected $fillable = array('project_id','status_id');
	public function status() {
	    return $this->belongsTo('App\Status', 'status_id');
	}

	public function taskprogress() {
    	return $this->hasMany('App\TaskProgress', 'assigned_status_id');
  	}
//	public function () {
//	    return $this->belongsTo('App\Status', 'status_id');
//	}
 /* 	public static function all($columns = array('*'))
	{
		$columns = is_array($columns) ? $columns : func_get_args();

		$instance = new static;

		return $instance->newQuery()->where('id','!=', 4)->get($columns);
	}

	public static function withAdminAll($columns = array('*'))
	{
		$columns = is_array($columns) ? $columns : func_get_args();

		$instance = new static;

		return $instance->newQuery()->get($columns);
	}
*/


	
}