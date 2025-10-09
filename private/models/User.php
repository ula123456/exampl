<?php 
/**
 * proverka vvoda dannih user reg
 */
class user extends Model
{
	protected $allowedColumns = [
		'firstname',
		'lastname',
		'email',
		'password',
		'gender',
		'rang',
		'date',
	];

	protected $beforeInsert = [
		'make_user_id', 
		'make_school_id',
		'hash_password'
	];

	public function validate($DATA)//proveryaet vvedenie dannie s formi view
	{
//chek firstname
		if (empty($DATA['firstname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['firstname'])  ) {
			// code...
			
			$this->errors['firstname']="only letters allowed in first name";
		}
//chek for lastname
		if (empty($DATA['lastname']) || !preg_match('/^[a-zA-Z]+$/', $DATA['lastname'])  ) {
			// code...
			
			$this->errors['lastname']="only letters allowed in first name";
		}

//chek for email
		if (empty($DATA['email']) || !filter_var( $DATA['email'], FILTER_VALIDATE_EMAIL) ) {
			// code...
			$this->errors['email']="email is not valid";
		}
//chek for email exist
		if ($this->where('email',$DATA['email']))  {
			// code...
			$this->errors['email']="that email is already in use";
		}

//chek for pasword
		if (empty($DATA['password']) || $DATA['password'] !== $DATA['password2'] ) {
			// code...
			$this->errors['password']="the passsword do not match";
		}
//chek for pasword lenth
		if (strlen($DATA['password']) < 8) 
		{
			// code...
			$this->errors['password']="the passsword mast be at list charackters long";
		}
//chek for gender
		$genders = ['male', 'female'];
		if (empty($DATA['gender']) || !in_array($DATA['gender'], $genders)   ) 
		{
			// code...
			$this->errors['gender']="gender is not valid";
		}

		
//chek for rang
		$rang = ['student', 'reception', 'lecturer', 'admin', 'super_admin'];
		if (empty($DATA['rang']) || !in_array($DATA['rang'], $rang)   ) 
		{
			// code...
			$this->errors['rang']="rang is not valid";
		}

		if (count($this->errors) == 0)
		{
			// code...
		    return true;
		}
		
		return false;
	}

	//protected function random_stiring($length){//случайно выбирая из массива $array лепит массив $text 
	//$array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');    $text = "";    for($x= 0; $x < $length; $x++)    {
     //   $random = rand(0,61);        $text .= $array[$random];    }    return $text;	}

	protected function make_user_id($data){

			$data['user_id'] = strtolower($data['firstname'] ."." .$data['lastname']) ;

			while ($this->where('user_id', $data['user_id'])) {
				
				$data['user_id'] .= rand(100,9999);
			}
			
			return $data;
	}

	protected function make_school_id($data){
		
		if (isset($_SESSION['USER']->school_id)) {
			// code...
			$data['school_id'] = $_SESSION['USER']->school_id;
		}
		
		return $data;
	}

	protected function hash_password($data){
		$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
		return $data;}
	
		
	
}
