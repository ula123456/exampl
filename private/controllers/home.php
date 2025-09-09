<?php 

/**
 * 
 */

class Home extends Controller
{
	
	function index()
	{
		$user = $this->load_model('User');

		$data = $user->findAll();
		//$data = $user->where('firstname','ali');
		echo $this->view('home',['rows'=>$data]);
		
	}
}