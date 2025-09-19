<?php 

/**
 * 
 */

class users extends Controller
{
	
	function index()
	{
		if (!Auth::logged_in()) 
		{
			$this->redirect('login');
		}
		
		$user = new user();
		$school_id = Auth::getSchool_id();
		//$data = $user->findAll();
		$data = $user->query("select * from users where school_id = :school_id",['school_id'=>$school_id]);
		//echo"<pre>"; var_dump($data);
		$this->view('users',['rows'=>$data]);
		
	}
}