<?php


class UserTypes extends Eloquent{

	protected $table = 'user_types';

	protected $fillable = array('user_id','type','rest_id');

}