<?php  

/**
 * main class
 */
class Controller 
{
	
	public function view($view, $data = array())
	{
		extract($data);

		// code...
		if (file_exists("private/views/".$view.".view.php")) 
		{
			// code...
			require ("private/views/".$view.".view.php");
		}else{

			require ("private/views/404.view.php");
		}
	}
}