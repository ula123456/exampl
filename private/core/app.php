<?php

/**
 * main app file
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
			$this->controller = $URL[0];
		}			
		require ("private/controllers/".$this->controller.".php");
		
		$this->controller = new $this->controller();
		
	}

	private function getURL()
	{
		$url = isset($_GET['url']) ?  $_GET['url'] : "home"; //есди url пуст по умолчанию home для переноса в домашную страницу
		return explode("/", filter_var(trim($url, "/")), FILTER_SANITIZE_URL); 
		//разбивает и срезает"/" с url
	}
}