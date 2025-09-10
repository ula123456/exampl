<?php 
/**
 * proverka vvoda dannih user reg
 */
class user extends Model
{
	public function validate($DATA)
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
	
}
