<?php
$sql = mysql_connect('localhost','root','') or die('Could not connect to server');
mysql_select_db('batch_24_core_joinsdata') or die('Could not connect to server');

$innerjoin = mysql_query("SELECT Orders.OrderID, Customers.CustomerName,Customers.CustomerID,Customers.ContactName,Customers.Country, Orders.OrderDate FROM Orders INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID;");


$leftjoin = mysql_query("SELECT Customers.*, Orders.CustomerID FROM Customers LEFT JOIN Orders ON Customers.CustomerID=Orders.CustomerID ORDER BY Customers.CustomerName;");


$rightjoin = mysql_query("SELECT Customers.CustomerID, Orders . * FROM Customers RIGHT JOIN Orders ON Orders.CustomerID = Customers.CustomerID ORDER BY Orders.OrderID;");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joins using PHP</title>
<style>
body
{
	font-family:Verdana;
	font-size:12px;
}
</style>
</head>
<body>
	<table cellpadding="0px" cellspacing="0px" border="0" width="800px" align="center">
        <tr>
            <td >
               <p>
                
                <b>An SQL JOIN clause is used to combine rows from two or more tables, based on a common field between them.</b></p>
                <strong>INNER JOIN:</strong> Returns all rows when there is at least one match in BOTH tables<br /><br />
                <strong>LEFT JOIN:</strong> Return all rows from the left table, and the matched rows from the right table<br /><br />
                <strong>RIGHT JOIN:</strong> Return all rows from the right table, and the matched rows from the left table<br /><br />
                </p>	
            </td>
        </tr>
        <tr>
            <td>
                <table cellpadding="0px" cellspacing="0px" width="800px" border="1">
                	<tr>		
                        <th colspan="6" style="color:#fff; background-color:#000; height:30px;">INNER JOINS</th>
                    </tr>
                    <tr>		
                        <th>OrderID</th>
                        <th>CustomerID</th>
						<th>CustomerName</th>
						<th>ContactName</th>
						<th>Country</th>
                        <th>OrderDate</th>
                    </tr>
                    <?php while($innerrow = mysql_fetch_array($innerjoin)){?>
                    <tr>		
                        <td><?php echo $innerrow['OrderID']; ?></td>
						<td><?php echo $innerrow['CustomerID']; ?></td>
                        <td><?php echo $innerrow['CustomerName']; ?></td>
						<td><?php echo $innerrow['ContactName']; ?></td>
						<td><?php echo $innerrow['Country']; ?></td>
                        <td><?php echo $innerrow['OrderDate']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </td>
        </tr>
        <tr>
        	<td height="50px">&nbsp;</td>
        </tr>
        <tr>
            <td>
                <table cellpadding="0px" cellspacing="0px" width="800px" border="1">
                	<tr>		
                        <th colspan="5" style="color:#fff; background-color:#000; height:30px;">LEFT JOINS</th>
                    </tr>
                    <tr>	
                    	<th>CustomerID</th>
                        <th>CustomerName</th>	
                        <th>ContactName</th>
                        <th>Country</th>
                        
                    </tr>
                    <?php while($leftrow = mysql_fetch_array($leftjoin)){?>
                    <tr>
                         <td><?php echo $leftrow['CustomerID']; ?></td>
                         <td><?php echo $leftrow['CustomerName']; ?></td>
                         <td><?php echo $leftrow['ContactName']; ?></td>
                         <td><?php echo $leftrow['Country']; ?></td>
                         
                    </tr>
                    <?php } ?>
                </table>
            </td>
        </tr>
        <tr>
        	<td height="50px">&nbsp;</td>
        </tr>
        <tr>
            <td>
                <table cellpadding="0px" cellspacing="0px" width="800px" border="1">
                	<tr>		
                        <th colspan="5" style="color:#fff; background-color:#000; height:30px;">RIGHT JOINS</th>
                    </tr>
                    <tr>
						<th>CustomerID</th>					
                    	<th>OrderID</th>
                        <th>OrderDate</th>	                      
                    </tr>
                    <?php while($rightrow = mysql_fetch_array($rightjoin)){?>
                    <tr>
                         <td><?php echo $rightrow['CustomerID']; ?></td>
                         <td><?php echo $rightrow['OrderID']; ?></td>
                         <td><?php echo $rightrow['OrderDate']; ?></td>                         
                    </tr>
                    <?php } ?>
                </table>
            </td>
        </tr>
	</table>
</body>
</html>