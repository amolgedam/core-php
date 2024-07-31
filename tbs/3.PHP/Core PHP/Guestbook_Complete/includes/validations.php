<?php
function validate_signup()
{
	$errors = array();
	if(empty($_POST['name']))
	{
		$errors['name'] = "Please Enter Name";
	}
	elseif(!preg_match("#^[-A-Za-z' ]*$#",$_POST['name']))
		$errors['name'] = "Please enter valid Name";
	
	if(empty($_POST['email_address']))
	{
		$errors['email_address'] = "Please Enter Email Address";
	}
	elseif(!filter_var($_POST['email_address'],FILTER_VALIDATE_EMAIL))
	{
		$errors['email_address'] = "Please enter valid email address";
	}
	
	if(empty($_POST['password']))
	{
		$errors['password'] = "Please Enter Password";
	}
	return $errors;
}
function validate_login()
{
	$errors = array();
	if(empty($_POST['email_address']))
	{
		$errors['email_address'] = "Please Enter Email Address";
	}
	elseif(!filter_var($_POST['email_address'],FILTER_VALIDATE_EMAIL))
	{
		$errors['email_address'] = "Please enter valid email address";
	}
	
	if(empty($_POST['password']))
	{
		$errors['password'] = "Please Enter Password";
	}
	return $errors;
}
function validate_guest()
{
	$errors = array();
	if(empty($_POST['name']))
	{
		$errors['name'] = "Please Enter Name";
	}
	if(empty($_POST['address']))
	{
		$errors['address'] = "Please Enter address";
	}
	if(empty($_POST['gender']))
	{
		$errors['gender'] = "Please select Gender";
	}
	if(empty($_POST['hobbies']))
	{
		$errors['hobbies'] = "Please select Hobbies";
	}
	if($_POST['city_id']==0)
	{
		$errors['city_id'] = "Please select City";
	}
	if($_FILES['avatar']['error']==4)
	{
		$errors['avatar'] = "Please select avatar";
	}
	return $errors;
}
function validate_edit()
{
	$errors = array();
	if(empty($_POST['name']))
	{
		$errors['name'] = "Please Enter Name";
	}
	if(empty($_POST['address']))
	{
		$errors['address'] = "Please Enter address";
	}
	if(empty($_POST['gender']))
	{
		$errors['gender'] = "Please select Gender";
	}
	if(empty($_POST['hobbies']))
	{
		$errors['hobbies'] = "Please select Hobbies";
	}
	if($_POST['city_id']==0)
	{
		$errors['city_id'] = "Please select City";
	}
	
	return $errors;
}
function cpassword()
{
	$errors = array();
	if(empty($_POST['op']))
	{
		$errors['op'] = "Please Enter Old Password";
	}
	if(empty($_POST['np']))
	{
		$errors['np'] = "Please Enter New Password";
	}
	if(empty($_POST['cp']))
	{
		$errors['cp'] = "Please Conformed Password";
	}
	return $errors;
}
function forgot()
{
	$errors = array();
	if(empty($_POST['forgot']))
	{
		$errors['forgot'] = "Please Enter Email Address";
	}
	return $errors;
}
?>
