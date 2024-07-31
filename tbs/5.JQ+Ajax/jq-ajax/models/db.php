<?php
class DB
{
	var $host = 'localhost';
	var $user = 'root';
	var $password = '';
	var $database = 'batch_25_jqajax';

	function __construct($host = '', $user = '', $password = '', $database = '')
	{
		$con = mysql_connect($this->host, $this->user,$this->password) OR die('Couldnot connect to mysql Server');
		mysql_select_db($this->database) OR die('Couldnot connect to mysql database '.$this->database);
	}

	function save($table, $fields, $condition = '')
	{
		$sql = "INSERT INTO $table SET ";
		if($condition != '')
			$sql = "UPDATE $table SET ";
		//print_r($fields);exit;
		
		$table_fields = $this->get_table_fields($table);

		foreach($fields as $field=>$value)
		{
			if(in_array($field,$table_fields))
				$sql .= "$field = '".addslashes($value)."', ";
		}

		$sql = substr($sql, 0 ,-2);
		
		if($condition != '')
			$sql .= " WHERE $condition";
		//print_r($sql);exit;
		$result = mysql_query($sql);
		
		if(mysql_affected_rows())
			return true;
		else
			return false;

	}

	function delete($table, $condition)
	{
		$sql = "DELETE FROM $table WHERE $condition";
		//print_r($sql);exit;
		$result = mysql_query($sql);
		if(mysql_affected_rows())
			return true;
		else
			return false;
	}

	function select($table, $fields = array(), $condition = '',$order = '',$limit ='')
	{
		$data = array();
		$sql = "SELECT ";

		if(is_array($fields) && count($fields) > 0)
		{	
			$sql .= implode(", ",$fields);		
		}
		else
		{
			$sql .= "*";
		}

		$sql .= " FROM $table";

		if($condition != '')
			$sql .= " WHERE $condition";

		if($order != '')
			$sql .= " ORDER BY $order";
		
		if($limit != '')
			$sql .= " LIMIT $limit"; 	
		//print_r($sql);exit;
		$result = mysql_query($sql);

		while($row = mysql_fetch_array($result,MYSQL_ASSOC))
		{
			$data[] = $row;
		}
		//print_r($data);exit;
		return $data;
		
	}

	function get_table_fields($table)
	{
		$fields = array();
		$result = mysql_query("SHOW COLUMNS FROM $table");
		while($row = mysql_fetch_array($result,MYSQL_ASSOC))
		{
			$fields[] = $row['Field'];
		}

		return $fields;
	}
	
	function select_result($table,$condition='')
	{
		$sql = "select count(*) from $table";
		if($condition !='')
		{
			$sql .= " where $condition";
		}
		//print_r($sql);exit;
		$result = mysql_query($sql);
		$finalresult = mysql_result($result,0);
		return $finalresult;
	}
}
?>
