<?php
//use Codesleeve\Stapler\ORM\StaplerableInterface;
//use Codesleeve\Stapler\ORM\EloquentTrait;
//implements StaplerableInterface
class Restaurant extends Eloquent  {

	//use EloquentTrait;
	protected $table = 'restaurants';

	protected $fillable = array('rest_name', 'description', 'city','country','owners_id','picture','image_type');

	public static $rules = array(
			'rest_name'=>'required|min:2|max:100|regex:/^[\pL\s]+$/u',
			'description'=>'required|min:2|max:250|regex:/(^[A-Za-z0-9., ]+$)+/',
			'city'=>'required|min:2|max:100|regex:/^[\pL\s]+$/u',
			'country'=>'required|min:2|max:100|regex:/^[\pL\s]+$/u'
		);
	//'pricing_value' => 'regex:/^\d*(\.\d{2})?$/'
	public static function validate($data){
		return Validator::make($data, static::$rules);
	}

	public static $rules1 = array(
		'restaurant_id'=>'required|numeric'
		);

	public static function validate1($data){
		return Validator::make($data, static::$rules1);
	}

/*	public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('imagea', [
            'styles' => [
                'medium' => '300x300',
                'thumb' => '100x100'
            ]
        ]);

        parent::__construct($attributes);
    }
*/

}
