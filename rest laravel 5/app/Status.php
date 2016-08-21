<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Status extends Model {
protected $table = 'statuses';
protected $fillable = array('id','name','order','global');
//public function status() {
//	    return $this->belongsTo('App\TaskProgres', 'assigned_status_id');
//	}
  public function go(){
  	$a='es';
  	return self::all();
  }

}