<?php

/**
 * main app file
 */
class App
{
	protected $control = "home"; //по умолчанию
	protected $metod = "index";  // свегда вызывался домашня страница
	protected $params = array(); 
	function __construct()

	{
		// code...
		echo "<pre>";
		print_r($this->getUrl());
	}

	private function getURL()
	{
		return explode("/", filter_var(trim($_GET['url'], "/")), FILTER_SANITIZE_URL); 
		//разбивает и срезает"/" с url
	}
}