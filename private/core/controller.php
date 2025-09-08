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
			return file_get_contents( ("private/views/".$view.".view.php"));
		}else{

			return file_get_contents(("private/views/404.view.php"));
		}
	}
}