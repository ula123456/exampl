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
				$arr['firstname'] = $_POST['firstname'];
				$arr['lastname'] = $_POST['lastname'];
				$arr['date'] = date("Y-m-d H:i:s");
				$arr['gender'] = $_POST['gender'];
				$arr['rang'] = $_POST['rang'];
				$arr['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$arr['email'] = $_POST['email'];
				

				$user->insert($arr);
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