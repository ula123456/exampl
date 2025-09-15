<?php  

/**
 * main class данные оеденяются с html
 */
class Controller 
{
	
	public function view($view, $data = array())
	{
		extract($data);

		// esli est fayl vizivaemiy ...view.php 
		if (file_exists("private/views/".$view.".view.php")) 
		{
			// zagruzi
			require ("private/views/".$view.".view.php");
		}else{
				// inache oshibka 404
			require ("private/views/404.view.php");
		}
	}

	public function load_model($model)
	{
		if (file_exists("private/models/". ucfirst($model).".php"))
		{  // vizvi model i soszaday ekzemplyar klassa etoy modeli
			require ("private/models/". ucfirst($model).".php");
			return $model= new $model();
		}
		return folse;
	}
	public function redirect($link){

		header("Location: /".trim($link,"/"));
		die;
	}
}