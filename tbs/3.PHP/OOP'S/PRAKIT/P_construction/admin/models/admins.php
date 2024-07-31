<?php 
class admins extends DB
{
	var $table = "admins";

function validate_login()
{
	$errors = array();
	
	if(empty($_POST['username']))
	{
		$errors['username'] = "Please Enter Email Address";
	}
	elseif(!filter_var($_POST['username'],FILTER_VALIDATE_EMAIL))
	{
		$errors['username'] = "Please Enter Valid Email Address";
	}
	
	if(empty($_POST['password']))
	{
		$errors['password'] = "Please Enter Password";
	}
	elseif(strlen($_POST['password'])<8)
	{
		$errors['password'] = "Password should be greater than 8 char";
	}
	return $errors;
}

}
?>