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
	public static function logout($row)
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
}