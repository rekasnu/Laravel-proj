<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class TaskProgress extends Model {
protected $table = 'task_progresses';
//protected $fillable = array('id','user_id','project_id','task_id','assigned_status_id','created_at','updated_at');

//public function stat() {
//	    return $this->belongsTo('App\AssignedStatus', 'assigned_status_id');
//	}

}