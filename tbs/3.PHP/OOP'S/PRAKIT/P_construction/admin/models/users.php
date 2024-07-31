<?php 
class users extends DB
{
	var $table = "users";


/*function validate_user_add()
{
	$errors = array();
	if(empty($_POST['name']))
	{
		$errors['name'] = "Please Enter Name";
	}
	elseif(!preg_match("#^[-A-Za-z' ]*$#",$_POST['name']))
	{
		$errors['name'] = "Please enter valid name";
	}
	if(empty($_POST['address']))
	{
		$errors['address'] = "Please Enter Address";
	}
	if(empty($_POST['gender']))
	{
		$errors['gender'] = "Please Select Gender";
	}
	if(empty($_POST['hobbies']))
	{
		$errors['hobbies'] = "Please Select Hobbies";
	}
	if($_POST['city']=="0")
	{
		$errors['city'] = "Please Select City";
	}
	if($_FILES['avatar']['error']==4)
	{
		$errors['avatar'] = "Please Select Avatar";
	}
	return $errors;

}
function validate_user_edit()
{
	$errors = array();
	if(empty($_POST['name']))
	{
		$errors['name'] = "Please Enter Name";
	}
	elseif(!preg_match("#^[-A-Za-z' ]*$#",$_POST['name']))
	{
		$errors['name'] = "Please enter valid name";
	}
	if(empty($_POST['address']))
	{
		$errors['address'] = "Please Enter Address";
	}
	if(empty($_POST['gender']))
	{
		$errors['gender'] = "Please Select Gender";
	}
	if(empty($_POST['hobbies']))
	{
		$errors['hobbies'] = "Please Select Hobbies";
	}
	if($_POST['city']=="0")
	{
		$errors['city'] = "Please Select City";
	}
	
	return $errors;
}
*/
function validate_signup()
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
/*function validate_addguest()
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
	if(empty($_POST['address']))
	{
		$errors['address'] = "Please Enter Address";
	}
	
	if(empty($_POST['gender']))
	{
		$errors['gender'] = "Please Select Gender";
	}
	if(empty($_POST['hobbies']))
	{
		$errors['hobbies'] = "Please Select Hobbies";
	}
	if($_POST['city_id']==0)
	{
		$errors['city_id'] = "Please Select City";
	}
	if($_FILES['avatar']['error']==4)
	{
		$errors['avatar'] = "Please Select Avatar";
	}
	return $errors;
	
}
*/
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
/*function validate_addcity()
{
	$errors = array();
	if(empty($_POST['city']))
	{
		$errors['city'] = "Please Select City";
	}
	return $errors;
}
function validate_edit_friend()
{
	$errors = array();
	if(empty($_POST['name']))
	{
		$errors['name'] = "Please Enter Name";
	}
	if(empty($_POST['email']))
	{
		$errors['email'] = "Please Enter Email";
	}
	if(empty($_POST['address']))
	{
		$errors['address'] = "Please Enter Address";
	}
	if(empty($_POST['city_id']==0))
	{
		$errors['city_id'] = "Please Select City";
	}
	if(empty($_POST['gender']))
	{
		$errors['gender'] = "Please Select Gender";
	}
	if(empty($_POST['hobbies']))
	{
		$errors['hobbies'] = "Please Select Hobbies";
	}	
	return $errors;
}
function change_password()
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
		$errors['cp'] = "Please Enter Confirm Password";
	}
	if($_POST['np']!=$_POST['cp'])
	{
		$errors['cp'] = "New Password &amp; Confirm Password Mismatch";
	}
	return $errors;
	
}
function forget_password()
{
	$errors = array();
	if(empty($_POST['email']))
	{
		$errors['email'] = "Please Enter Email";
	}
	elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
	{
		$errors['email'] = "Please Enter Valid Email Address";
	}
	return $errors;
}
*/
}
?>