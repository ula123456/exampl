<?php 

/**
 * 
 */

class Signup extends Controller
{
	
	function index()
	{
		$errors= array();
		if (count($_POST)>0) 
		{
			// code...
			$user = new User();

			if ($user->validate($_POST)) {
				// code...
				$this->redirect('login');
			}else{
				//erorrs
				$errors = $user->errors;
			}
		}
		
		 $this->view('signup', [
		 	'errors'=>$errors,
		 ]);
		
	}
}