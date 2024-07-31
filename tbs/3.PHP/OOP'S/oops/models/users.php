<?php
	class users extends DB
	{
		//member variables
		var $table = "users";
		
		//member function 
		function validate_add()
		{
			$errors = array();
			if(empty($_POST['name']))
			{
				$errors[]="Please Enter name";
			}
			if(empty($_POST['gender']))
			{
				$errors[]="Please select Gender";
			}
			if($_FILES['avatar']['error']==4)
			{
				$errors[]="Please Select File";
			}
			return $errors;
		}
	}
?>