function myform()
				{
						if(document.monster.email.value=="")
							{
								document.getElementById("eemail").innerHTML="<font class='error'>*</font>";
								document.monster.email.focus();
								return false;
							}
				
						if(document.monster.firstname.value=="")
							{
								document.getElementById("ename").innerHTML="<font class='error'>*</font>";
								document.monster.firstname.focus();
								return false;
							}
							
						if(document.monster.lastname.value=="")
							{
								document.getElementById("elname").innerHTML="<font class='error'>*</font>";
								document.monster.lastname.focus();
								return false;
							}
						
						if(document.monster.Username.value=="")
							{
								document.getElementById("eusername").innerHTML="<font class='error'>*</font>";
								document.monster.Username.focus();
								return false;
							}
							
						if(document.monster.password.value=="")
							{
								document.getElementById("epassword").innerHTML="<font class='error'>*</font>";
								document.monster.password.focus();
								return false;
							}
						
						if(document.monster.repassword.value=="")
							{
								document.getElementById("erepassword").innerHTML="<font class='error'>*</font>";
								document.monster.repassword.focus();
								return false;
							}
						
						if(document.monster.city.value==0)
							{
								document.getElementById("ecity").innerHTML="<font class='error'>*</font>";
								document.monster.city.focus();
								return false;
							}
						
						if(document.monster.mobno.value=="")
							{
								document.getElementById("emobile").innerHTML="<font class='error'>*</font>";
								document.monster.mobno.focus();
								return false;
							}
						
						if(document.monster.jobcity.value==0)
							{
								document.getElementById("ejob").innerHTML="<font class='error'>*</font>";
								document.monster.jobcity.focus();
								return false;
							}
							
						if(document.monster.nationality.value==0)
							{
								document.getElementById("enationality").innerHTML="<font class='error'>*</font>";
								document.monster.nationality.focus();
								return false;
							}
							
						if(document.monster.gender.value==0)
							{
								document.getElementById("egender").innerHTML="<font class='error'>*</font>";
								document.monster.gender.focus();
								return false;
							}
							
						if(document.monster.year.value==0)
							{
								document.getElementById("eyear").innerHTML="<font class='error'>*</font>";
								document.monster.year.focus();
								return false;
							}
							
						if(document.monster.month.value==0)
							{
								document.getElementById("emonth").innerHTML="<font class='error'>*</font>";
								document.monster.month.focus();
								return false;
							}
							
						if(document.monster.Industry.value==0)
							{
								document.getElementById("eIndustry").innerHTML="<font class='error'>*</font>";
								document.monster.Industry.focus();
								return false;
							}
							
						if(document.monster.Industry1.value==0)
							{
								document.getElementById("eIndustry1").innerHTML="<font class='error'>*</font>";
								document.monster.Industry1.focus();
								return false;
							}
							
						if(document.monster.skill.value==0)
							{
								document.getElementById("eskill").innerHTML="<font class='error'>*</font>";
								document.monster.skill.focus();
								return false;
							}
				}
				