<?php 

/**
 * 
 */

class Home extends Controller
{
	
	function index()
	{
		
		$user = new user();
		
		$data = $user->findAll();
		
		$this->view('home',['rows'=>$data]);
		
	}
}