<?php 
function validate_signup()
{
	$errors = array();
	if(empty($_POST['name']))
	{
		$errors['name'] = "Please Enter Name";
	}
	elseif(!preg_match("#^[-A-Za-z' ]*$#",$_POST['name']))
		$errors['name'] = "Please enter valid name";
		
	if(empty($_POST['email']))
	{
		$errors['email'] = "Please Enter Email Address";
	}
	elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	{
		$errors['email'] = "Please Enter Email Address";
	}
	if(empty($_POST['password']))
	{
		$errors['password'] = "Please Enter Password";
	}
	return $errors;
}	



?>