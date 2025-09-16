<?php

/**
 * School Model
 */
class School extends Model
{

	protected $allowedColumns = [
        'school',
        'date',
    ];

    protected $beforeInsert = [
        'make_school_id',
        'make_user_id',
    ];

    protected $afterSelect = [
        'get_user',
    ];


    public function validate($DATA)
    {
        $this->errors = array();

        //check for school name
        if(empty($DATA['school']) || !preg_match('/^[a-zA-Z]+$/', $DATA['school']))
        {
            $this->errors['school'] = "Only letters allowed in school name";
        }
 
        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }
	protected function make_user_id($data){
		
		if(isset($_SESSION['USER']->user_id)){
            $data['user_id'] = $_SESSION['USER']->user_id;
        }
        return $data;echo "<pre>";var_dump($data);
	}
	
	protected function make_school_id($data)
	{
			$data['school_id'] = random_stiring(10);
			return $data;
	}

	
	
	

	
	
		
	
}
