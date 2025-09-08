<?php

/**
 * main app file очишает url и через url подключает классы контролера если в url ser по подключает класс user
 */
class App
{
	protected $controller = "home"; //по умолчанию
	protected $method = "index";  // свегда вызывался домашня страница
	protected $params = array(); 
	
	public function __construct()
	{
		// code...// iz url videlyaem pervuyu stroku eto budet fayl controller esli on est vizivaet esli net po umolchaniyu home
		$URL = $this->getUrl();
		if(file_exists("private/controllers/".$URL[0].".php")){ 
			$this->controller = ucfirst($URL[0]);
			unset($URL[0]);
		}			
		require ("private/controllers/".$this->controller.".php");
		
		$this->controller = new $this->controller();
		//esli est kakoyto metod
		if (isset($URL[1])) {
			// esli etot metod sushetvuet v klasse
			if (method_exists($this->controller, $URL[1])) {
				// code...
				$this->method = ucfirst( $URL[1]);
				unset($URL[1]);

			}
		}
		$URL=array_values($URL); // menyaet index masiva v paramtrax
		$this->params = $URL;
		
		call_user_func_array([$this->controller,$this->method], $this->params);// vizivaet funktsiyu i metod peredavaya parametri
		
	}

	private function getURL()
	{
		$url = isset($_GET['url']) ?  $_GET['url'] : "home"; //есди url пуст по умолчанию home для переноса в домашную страницу
		return explode("/", filter_var(trim($url, "/")), FILTER_SANITIZE_URL); 
		//разбивает и срезает"/" с url
	}
}