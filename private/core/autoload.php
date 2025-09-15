<?php

require ("config.php");
require ("functions.php");
require ("database.php");
require ("controller.php");
require ("model.php");
require ("app.php");	
//require ("private/Auth.php");
spl_autoload_register(	function($class_name){	require "private/models/". strtolower($class_name) . ".php";});
