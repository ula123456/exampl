<?php

/**
 * 
 */
class Model extends Database
{
	

	function __construct()
	{
		// code...
		if(!property_exists($this, 'table'))
		{
			$this->table = strtolower(Model::class)."s";
		}
	}
	public function where($column, $value)
	{
		$column = addslashes($column);
		$query="select * from $this->table where $column = :value";
		echo $query;
		return $this->query($query,['value' =>$value]);
	}

	public function findAll()
	{
		
		$query="select * from $this->table";
		
		return $this->query($query);
	}

	public function insert($data)
	{
		
		$keys = array_keys($data);
		$columns = implode(',', $keys);
		$values = implode(',:', $keys);
		

		$query="INSERT INTO $this->table ($columns)  VALUES (:$values)";

		return $this->query($query,$data);
	}

	public function update($id,$data)
	{
		
	}
	public function delete($id)
	{
		
		$query="select * from $this->table";
		
		return $this->query($query,$data);
	}
}