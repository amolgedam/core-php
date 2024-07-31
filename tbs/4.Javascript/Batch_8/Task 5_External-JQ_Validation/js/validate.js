function validate_add()
{
	if(document.myform.name.value=="")
	{
		document.getElementById("ename").innerHTML = "<div class='error'>Please Enter Name</div>";
		document.myform.name.focus();
		return false;
	}
	else if(document.myform.address.value=="")
	{
		document.getElementById("eaddress").innerHTML = "<div class='error'>Please Enter Address</div>";
		document.myform.address.focus();
		return false;
	}
	else if(document.myform.gender.value=="")
	{
		document.getElementById("egender").innerHTML = "<div class='error'>Please Select Gender</div>";
		return false;
	}
	else if(document.myform.city.value ==0 )
	{
		document.getElementById("ecity").innerHTML = "<div class='error'>Please Select City</div>";
		return false;
	}
}