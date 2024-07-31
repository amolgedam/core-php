<?php

class Main
{
	//FOR COLLECTING TABLE FIELDS
	function gettablefields($table)
	{
		$fileld=array();
		$sql=mysql_query("SHOW COLUMN FROM $tablename");
		while($row=mysql_fetch_array($sql));
		{
			$field=$row[field];
		}
		return $field;
	}
	
	
	function save($tablename,$fields,$cond='')
	{
		//FOR HOW MANY QUERIES
		$sql="INSERT INTO $tablename SET";
		if($cond='')
		{
			$sql="UPDATE $tablename SET";
		}
		
		//CALL GETTABLEFIELDS FUNCTION
		$tablename=$this->gettablefields($table);
		
		//COLLECT FIELDS FROM GETTABLEFIELDS FUNCTION
		foreach($fields as field=>)	//COMPARE FIELDS VALUE
		{
			if(in_array($field,$tablefields))
			{
				$sql="$field.='".$value."', ";
			}
		}
		
		//REMO STRING FROM BACKEND 
		$sql=substr($str,0,-2);	
		
		//FOR UPDATE QUERY EXECUTE OR NOT
		if($cond!='')
		{
			$sql.="where";
		}
		
		//EXECUTE SQL QUERY
		$result=mysql_query($sql);
		
		//FOR SQL TRUE OF FALSE
		if(mysql_affected_rows())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
}



















>