<?php

/**
 * 
 */
class Auth 
{
	
	public static function authenticate($row)
	{
		// code...
		$_SESSION['USER'] = $row;
	}
	public static function logout()
	{
		// code...
		if(isset($_SESSION['USER'] ))
		{
			unset($_SESSION['USER']);
		}
	}
    


	public static function logged_in()
	{
		// code...
		if(isset($_SESSION['USER'] ))
		{
			return true;
		}
		return false;
	}   

	public static function user()
	{
		// code...
		if(isset($_SESSION['USER'] ))
		{
			return $_SESSION['USER']->firstname;
		}
		return false;
	}  
	/// imya fuktsii iz vew prevrashaet v metod naprimer getEmail vavodit email uzara
	public static function __callStatic($method, $params)
	{
		 $prop = strtolower(str_ireplace("get", "",$method));//get ubiraet
//echo "<pre>";var_dump($_SESSION['USER']);
		 if(isset($_SESSION['USER']->$prop ))
		{
			return $_SESSION['USER']->$prop;
		}
		return 'Unknown';
	}
	public static function switch_school($id)
	{
		
		if(isset($_SESSION['USER']) && $_SESSION['USER']->rang == 'super_admin')
		{
				$user = new user();
				$school = new school();
				$row = $school->where('id', $id); 
				if ($row) 
				{
					$row = $row[0];
					$arr['school_id'] = $row->school_id;

					
						$user->update($_SESSION['USER']->id,$arr);
						$_SESSION['USER']->school_id = $row->school_id;
						$_SESSION['USER']->school_name = $row->school;

					
				}
				
			return  true;
		}
		return false;
	} 
} //echo "<pre>";var_dump($_SESSION['USER']->id,$arr );