<?php

/**
 * 
 */
class Database
{
	
	private function connect()
	{
		// code...
		
		$con = new PDO('mysql:host=127.127.126.9;dbname=myschool','root','');
		if (!$con) {
			// code...
			die("could not connect to DB");
		}
		return $con ;
	}

	public function query($query,$data = array(),$data_type = "object")
	{

		$con = $this->connect();
		$stm = $con->prepare($query);

		$result = false;
		if($stm){
			$check = $stm->execute($data);
			if($check){
				if($data_type == "object"){
					$result = $stm->fetchAll(PDO::FETCH_OBJ);
				}else{
					$result = $stm->fetchAll(PDO::FETCH_ASSOC);
				}
 
 			}
		}

		//run functions after select
		if(is_array($result)){
			if(property_exists($this, 'afterSelect'))
			{
				foreach($this->afterSelect as $func)
				{
					$result = $this->$func($result);
				}
			}
		}

		if(is_array($result) && count($result) >0){
			return $result;
		}

		return false;
	}

	
}
	

	
	

