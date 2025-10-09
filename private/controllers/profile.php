<?php

/**
 * home controller
 */
class Profile extends Controller
{
	
	function index($id ='')
	{
		// code...

		$user = new User(); 
		$row = $user->first($id);

		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['profile','profile'];
		if($row){
			$crumbs[] = [$row->firstname,'profile'];
		}

		$this->view('profile',[
			'row'=>$row,
			'crumbs'=>$crumbs,
		]);
	}
}
