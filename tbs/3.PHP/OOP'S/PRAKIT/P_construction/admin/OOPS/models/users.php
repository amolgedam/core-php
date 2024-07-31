<?php 
class users extends DB
{
	// Member Variables
	var $table = "users";
	
	// Member Functions
	function validate_add()
	{
		$errors = array();
		if(empty($_POST['name']))
		{
			$errors[] = "Please Enter Name";
		}
		if(empty($_POST['gender']))
		{
			$errors[] = "Please Select Gender";
		}
		if($_FILES['avatar']['error']==4)
		{
			$errors[] = "Please Select Avatar";
		}
		return $errors;
	}	
	
}

?>