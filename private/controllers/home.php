<?php 

/**
 * 
 */

class Home extends Controller
{
	
	function index()
	{
		$db = new Database();
		$data = $db->query("select * from users");
		echo $this->view('home',['rows'=>$data]);
		
	}
}