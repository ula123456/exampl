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

		if($stm){
			$check = $stm->execute($data);
			if($check){
				if($data_type == "object"){
					$data = $stm->fetchAll(PDO::FETCH_OBJ);
				}else{
					$data = $stm->fetchAll(PDO::FETCH_ASSOC);
				}

				if(is_array($data) && count($data) >0){
					return $data;
				}

 			}
		}

		return false;
	}

	


	

	
	

}