<?php

/**
 * 
 */
class Model extends Database
{
	protected $table = 'users';
	public $errors = array();
	
	public function __construct()
	{

		// code...
		if(!property_exists($this, 'table'))
		{
			$this->table = strtolower($this::class) . "s";
		}
	}
	public function where($column, $value)
	{
		$column = addslashes($column);
		$query="select * from $this->table where $column = :value";
		
		return $this->query($query,['value' =>$value]);
	}

	public function findAll()
	{
		
		$query="select * from $this->table";
		
		
		return $this->query($query);
	}

	public function insert($data)
	{	
		//remove unwandet column
		if(property_exists($this, 'allowedColumns'))
		{
			foreach ( $data as $key=>$column)
			{
				
			 	if (!in_array($key, $this->allowedColumns)) 
			 	{
					unset($data[$key]);
			 	}
			}
		 }    
		//run function before insert
		if(property_exists($this, 'beforeInsert'))
		{
			 foreach ( $this->beforeInsert as $func)
			 {
			 		$data = $this->$func($data);
			 }
		 		 
		}
		
		$keys = array_keys($data);
		$columns = implode(',', $keys);
		$values = implode(',:', $keys);
		


		$query="INSERT INTO $this->table ($columns)  VALUES (:$values)";
echo "<pre>"; var_dump($query, );
		return $this->query($query,$data);
	}

	public function update($id,$data)
	{
		
		
		$str = "";
		foreach ($data as $key => $value) {
			// code...
			$str .=$key. "=:".$key.",";
		}
		
		$str = trim($str,",") ;

		$data['id'] = $id;
		$query="update $this->table set $str where id = :id";

		return $this->query($query,$data);
	}
	public function delete($id)
	{
		$query="DELETE FROM $this->table WHERE id = :id";
		$data['id'] = $id;

		return $this->query($query,$data);
	}
}
