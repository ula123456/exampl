<?php 

function get_var($key,$default = "")
{

	if(isset($_POST[$key]))
	{
		 $_POST[$key];
	}

	return $default;
}

function get_select($key,$value)
{
	if(isset($_POST[$key]))
	{
		if($_POST[$key] == $value)
		{
			return "selected";
		}
	}

	return "";
}

function esc($var){
	return htmlspecialchars($var);

}

function random_stiring($length){
//случайно выбирая из массива $array лепит массив $text 
	$array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    $text = "";

    for($x = 0; $x < $length; $x++)
    {
        $random = rand(0,61);
        $text .= $array[$random];
    }

    return $text;
	}
function get_date($date)
{
		if ($date === null || $date === '') {
        return '';
    }
    // If it's an integer timestamp, use it directly
    if (is_numeric($date) && (string)(int)$date === (string)$date) {
        return date('jS M, Y', (int)$date);
    }
    $ts = strtotime((string)$date);
    if ($ts === false) {
        return '';
    }
    return date('jS M, Y', $ts);
}
function dd($date)
{
	echo"<pre>";
		return var_dump($date);
	echo"<pre>";
}
function get_image($image,$gender = 'male'){

	if(!file_exists($image=''))
	{
 		$image = '../private/views/user_female.jpg';
 		if($gender == 'male'){
 			$image = '../private/views/user_male.jpg';
 		}
 	}

 	return $image;

}