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
		
		$data = $user->findAll();
		
		$this->view('users',['rows'=>$data]);
		
	}
}