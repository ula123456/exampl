<?php

/**
 * Classes Model
 */
class Classes_model extends Model
{
// poklyuchaet funksii
    protected $table='Classes';
	protected $allowedColumns = [
        'class',
        'date',
    ];
// poklyuchaet funksii
    protected $beforeInsert = [
        'make_school_id',
        'make_class_id',
        'make_user_id',
    ];
// poklyuchaet funksii
    protected $afterSelect = [
        'get_user',
    ];


    public function validate($DATA)
    {
        $this->errors = array();

        //check for class name
        if(empty($DATA['class']) || !preg_match('/^[a-z A-Z0-9]+$/', $DATA['class']))
        {
            $this->errors['class'] = "Only letters and nummber allowed in class name";
        }
 
        if(count($this->errors) == 0)
        {
            return true;
        }

        return false;
    }
    protected function make_school_id($data){
        
        if(isset($_SESSION['USER']->user_id)){
            $data['school_id'] = $_SESSION['USER']->school_id;
        }
        return $data;echo "<pre>";var_dump($data);
    }

	protected function make_user_id($data){
		
		if(isset($_SESSION['USER']->user_id)){
            $data['user_id'] = $_SESSION['USER']->user_id;
        }
        return $data;echo "<pre>";var_dump($data);
	}
	
	protected function make_class_id($data)
	{
			$data['class_id'] = random_stiring(10);
			return $data;
	}

    protected function get_user($data)
    {
        $user = new user();
        foreach ($data as $key => $row) 
        {
            $result = $user->where('user_id',$row->user_id);
            $data[$key] ->user= is_array($result) ? $result[0]:false;
        }
            
            return $data;
    }

	
		
		
	
}
