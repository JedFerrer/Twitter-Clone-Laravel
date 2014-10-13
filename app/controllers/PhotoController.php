<?php

class PhotoController extends BaseController {

	protected $user;

	public function __construct(User $user) 
	{
		$this->user = $user;
	}

	public function index() {
		$imgPath = "default/avatar1.png";
		return View::make('profile.picture', ['imgPath' => $imgPath]); 
	}

	public function update() {

		$file = array('image' => Input::file('image'));

		if (!$this->user->isValid($input = $file, 'uploadImgRules')) {
			return Redirect::back()->withInput()->withErrors($this->user->errors);
		}
			
			$folderName = str_random(8);
			$destinationPath = 'uploads/' . $folderName;
			$filename = $file['image']->getClientOriginalName();
			$extension = $file['image']->getClientOriginalExtension(); //if you need extension of the file

			$folderAndImagePath = $folderName . '/' . $filename;
			$uploadSuccess = $file['image']->move($destinationPath, $filename);
			 
			if($uploadSuccess) {
				$user = $this->user->find(Auth::user()->id);
				$user->img_path = $folderAndImagePath;
				$user->save();
				return Redirect::back()->with("message", "Your Profile picture successfuly uploaded");
			} else {
			   	return Redirect::back()->with("errMessage", "Some errors occured, Pls try again");
			}
			
	}
}

?>