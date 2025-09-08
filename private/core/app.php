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
		print_r( $this->getUrl());
	}

	private function getURL()
	{
		$url = isset($_GET['url']) ?  $_GET['url'] : "home"; //есди url пуст по умолчанию home для переноса в домашную страницу
		return explode("/", filter_var(trim($url, "/")), FILTER_SANITIZE_URL); 
		//разбивает и срезает"/" с url
	}
}