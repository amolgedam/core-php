<?php 
class enquiries extends DB
{
	var $table = "enquiries";

function validate_addguest()
{
	$errors = array();
	if(empty($_POST['name']))
	{
		$errors['name'] = "Please Enter Name";
	}
	elseif(!preg_match("#^[-A-Za-z' ]*$#",$_POST['name']))
	{
		$errors['name'] = "Please Enter Valid Name";
	}
	if(empty($_POST['email']))
	{
		$errors['email'] = "Please Enter Email Address";
	}
	elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	{
		$errors['email'] = "Please Enter Valid Email Address";
	}
	if(empty($_POST['subject']))
	{
		$errors['subject'] = "Please Enter Address";
	}
	if(empty($_POST['comment']))
	{
		$errors['comment'] = "Please Mention Your Comments";
	}
	if(empty($_POST['contact_no']))
	{
		$errors['contact_no'] = "Please Enter Your Contact Number";
	}
	if(empty($_POST['message']))
	{
		$errors['message'] = "Please Enter Message";
	}
	
	return $errors;
	
}

}
?>