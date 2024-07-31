<?php 
	require_once("includes/config.php");
	$users = new users;
	$sql = $users->select($users->table);
?>
<script>
			$("document").ready(function(){
				$(".textbox").hide();
				$(".save").hide();
				$(".edit").click(function(){
					var ID = $(this).attr("id"); 
					
					$("#text_name_"+ID).hide();
					$("#text_email_"+ID).hide();
					$("#text_mobile_"+ID).hide();
					
					$("#textbox_name_"+ID).show();
					$("#textbox_email_"+ID).show();
					$("#textbox_mobile_"+ID).show();
					
					$(".save").show();
					$(".edit").hide();
					$(".delete").hide();
				});
				
				$(".save").click(function(){
					var ID = $(this).attr("id"); 
					var name= $("#textbox_name_"+ID).val();
					var email= $("#textbox_email_"+ID).val();
					var mobile= $("#textbox_mobile_"+ID).val();
					
					$.ajax({
						type:'post',
						url:'save.php',
						data:"name="+name+"&email="+email+"&mobile="+mobile+"&id="+ID,
						cache:false,
						
						success:function(data){
							//alert(data);
							$("#text_name_"+ID).text(name);
							$("#text_email_"+ID).text(email);
							$("#text_mobile_"+ID).text(mobile);
							$("#msg").html("Update Success");
							
						}
					});
					
					
					$("#text_name_"+ID).show();
					$("#text_email_"+ID).show();
					$("#text_mobile_"+ID).show();
					
					$("#textbox_name_"+ID).hide();
					$("#textbox_email_"+ID).hide();
					$("#textbox_mobile_"+ID).hide();
					
					$(".edit").show();
					$(".save").hide();
					$(".delete").show();
					setTimeout(function(){
						$("#msg").toggle("slow");
					},3000);
				});
				
				$(".delete").click(function(){
					var conf = confirm("Delete?");
					if(conf==true)
					{
						var ID = $(this).attr("id");
						$.ajax({
							type:'post',
							url:'save.php',
							data:"id="+ID,
							cache:false,
							success:function(data)
							{
								if(data==1)
								{
									$("#tr_"+ID).fadeOut();
								}
							}
						})	
						
					}
				});
				
			});
		</script>
		
		
<div style="background-color:green;color:#fff; text-align:center; width:90%" id="msg"></div>
<table cellpadding="10px" cellspacing="0px" width="90%" align="center" border="1" id="regtable">
			
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Action</th>
			</tr>
			<?php foreach($sql as $rows){?>
			<tr id="tr_<?php echo $rows['id']; ?>">
				<td>
					<span id="text_name_<?php echo $rows['id']; ?>" class="text"><?php echo $rows['name']; ?></span>
					<input id="textbox_name_<?php echo $rows['id']; ?>" type="text" class="textbox" value="<?php echo $rows['name'];?>" />
				</td>
				<td>
					<span id="text_email_<?php echo $rows['id']; ?>" class="text"><?php echo $rows['email'];?></span>
					<input id="textbox_email_<?php echo $rows['id']; ?>" type="text" class="textbox" value="<?php echo $rows['email'];?>"/>
				</td>
				<td>
					<span id="text_mobile_<?php echo $rows['id']; ?>" class="text"><?php echo $rows['mobile'];?></span>
					<input id="textbox_mobile_<?php echo $rows['id']; ?>" type="text" class="textbox" value="<?php echo $rows['mobile'];?>"/>
				</td>
				<td>
				<a href="javascript:void(0)" class="edit" id="<?php echo $rows['id'];?>">Edit</a> <a href="javascript:void(0)" class="save" id="<?php echo $rows['id'];?>" name="save_<?php echo $rows['id'];?>">Update</a> | 
				<a href="javascript:void(0)" class="delete" id="<?php echo $rows['id'];?>">Delete</a></td>
			</tr>
			<?php } ?>
		</table>