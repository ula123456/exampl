<?php 

/**
 * 
 */

class Schools extends Controller
{
	
	function index()
	{
		if (!Auth::logged_in()) 
		{
			$this->redirect('login');
		}
		
		$school = new school();
		
		$data = $school->findAll();
		
		$this->view('schools',['rows'=>$data]);
		
	}
	function add()
	{
		if (!Auth::logged_in()) 
		{
			$this->redirect('login');
		}
		$errors= array();
		if (count($_POST) > 0) 
		{
			$school = new school();
//echo "<pre>";var_dump($school);
			if ($school->validate($_POST)) 
			{
				$_POST['date'] = date("Y-m-d H:i:s");
			
				$school->insert($_POST);
			
				$this->redirect('schools');
			}else{	//erorrs
				$errors = $school->errors;
			}

		}
		
		
		$this->view('schools.add',[
			'errors'=>$errors
		
		]);
		
	}
}