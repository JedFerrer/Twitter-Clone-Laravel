<?php


class Tweet extends Eloquent {
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

	public function author() {
        return $this->belongsTo('User', 'user_id');
    }

    public static function getByUser($user)
    {
   		return $user->tweets()->orderBy('id', 'DESC')->get();
    }

}
