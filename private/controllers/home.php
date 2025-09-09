<?php 

/**
 * 
 */

class Home extends Controller
{
	
	function index()
	{
		
		$user = new User();
		

			$arr['firstname'] = 'alim111';
        	$arr['lastname'] = 'babam111';
        	//$arr['date'] = '2025-09-09 07:32:18';
            //$arr['url_adress'] = 'fgfg';
            //$arr['gender'] = 'female';
            //$arr['school_id'] = '12';
            //$arr['rang'] = 'student';
			$user->update(1,$arr);
		//$user->insert($arr);
		$data = $user->findAll();
		//$data = $user->where('firstname','ali');
		$this->view('home',['rows'=>$data]);
		
	}
}