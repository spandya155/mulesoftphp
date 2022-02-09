<html>
<head>
	<title>Customer Details</title>
	<link rel="stylesheet" href="css/Styles.css" type="text/css" />
</head>
<body>
	<h1> Display Customer Details</h1>
<?php
	$conn=mysql_connect("localhost","root","");
	$db=mysql_select_db("PHPTEST",$conn);
	$qry = "SELECT * FROM CustomerDetails";
	$result=mysql_query($qry, $conn);
	echo "<table>
	<tr>
		<th>ID</th>
		<th>NAME</th>
		<th>MOBILE NO</th>
		<th>EMAIL-ID</th>
		<th>AMOUNT</th>
		<th>EDIT</th>
		<th>DELETE</th>
	</tr>";
	if(mysql_num_rows($result) > 0)
		while($row=mysql_fetch_array($result))
		{
			 echo "<tr><td>". $row[0]. "</td>
			 <td> ". $row[1]. "</td>
			 <td>". $row[2]. "</td>
			 <td> ". $row[3]. "</td>
			 <td> ". $row[4]. "</td>
			 <td><a href='Edit.php?id=". $row[0]. "'><img alt='Edit' width='30px' height='30px' src='images/edit.png' /></a></a></td>
			 <td><a href='Delete.php?id=". $row[0]. "'><img alt='Delete' width='35px' height='35px' src='images/delete.png' /></a></td>
			 </tr>";
		}
	else
		echo "<tr><td colspan=7>No Rows Available to Display.</td></tr>";
	echo "<tr><td colspan=7>". mysql_num_rows($result). " row(s) selected.</td></tr>";
	echo "</table>";
?>
<p>Wanna Insert a New Record??? <a href="insert.php">Click Here</a></p>
</body>
</html>