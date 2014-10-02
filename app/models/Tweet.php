<?php


class Tweet extends Eloquent {
	//public $timestamps = false;
	protected $fillable = ['tweet','user_id'];
	protected $table = 'tweets';

	public static $rules = [
		'tweet' => 'required|max:140'
	];

	public $errors;

	public function isValid($data) {

		$validation = Validator::make($data, static::$rules);
		
		if ($validation->passes()) return true;
	
		$this->errors = $validation->messages();
		return false;
	}


	public function users(){
        return $this->belongsTo('User');
    }

	// public function names()
 //    {
 //        return $this->hasMany('User');
 //    }


}
