<?php
class DB
{
	var $host = "localhost";
	var $user = "root";
	var $password = "";
	var $database = "oops";
	
	//constructor allocate the memory
	function __construct($host='', $user='', $password='', $database='')
	{
		$con = mysql_connect($this->host, $this->user, $this->password) or die ('could not connect to the server');
		mysql_select_db($this->database) or die ('could not connect to the database');
	}
	
	//to get table fields we have to create gettablefields
	function gettablefields($table)
	{
	$fields = array();
	$sql= mysql_query("show column from $table");
	while($rows = mysql_fetch_array($sql))
	{
		$fields[]=$rows['$fields'];
	}
	return $fields;
	}
	function save($table, $fields, $condition='')
	{
		$sql="insert into $table set";
		if($condition!='')
			$sql = "update $table set";
			$tablefields = $this->gettablefields($table);
			//foreach loop is used to save the date in array formate
			foreach($fields as $fields->$value)
			{
				if(in_array($fields, $tablefields))
				{
					$sql .=  "$fields = '".$value."', ";
				}	
			}
			$sql = substr($sql, 0, -2);
			if($condition!='')
				$sql .= "where $condition";
			$result = mysql_query($sql);
				if(mysql_affected_rows())
				{
					return true;
				}
				else{
					return false;
				}			
	}
	function select($table, $fields = array(), $condition = '', $order = '', $group = '', $limit = '')
	{
		$data = array();
		$sql = "select";
		if(is_array($fields) && count($fields)>0)
		{
			$sql .= impload(",", $fields);
		}
		else
		{
		$sql = "*";
		}
		$sql.= "from $table";
		if($condition!='')
		{
			$sql.= "where $condition";
		}
		if($condition!='')
		{
			$sql.= "order by $order";
		}
		if($group!='')
		{
			$sql.= "group by $ group";
		}
		if($limit!= '')
		{
			$sql.= "limit $limit";
		}
		//execution of query
		$result = mysql_query($sql);
		while($rows = mysql_fetch_array($sql, MYSQL_ASSOC))
		{
			$data = $rows;
		}
		return $data;
	}
	function delete($table, $condition)
	{
		$sql = "delete from $table where $condition=''";
		$result = mysql_query($sql);
		if (mysql_affected_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

?>