<html>
<head>
	<title>Insert Movies Details</title>
	<link rel="stylesheet" href="css/Styles.css" type="text/css" />
</head>
<body>
	<h1>Add new Movie</h1>
	<form action="#">
	<table>
		<tr>
			<th colspan=2>Enter Following Details:</th>
		</tr>
		<tr>
			<td>Name:</td>
			<td><input type='text' name='name' /></td>
		</tr>
		<tr>
			<td>Actor:</td>
			<td><input type='text' name='actor' /></td>
		</tr>
		<tr>
			<td>Actress:</td>
			<td><input type='text' name='actress' /></td>
		</tr>
		<tr>
			<td>Rating:</td>
			<td><input type='text' name='rating' value='0' /></td>
		</tr>
		<tr>
			<td><input type='submit' name='submit' value='Insert' /></td>
			<td><input type='reset' name='reset' value='Reset' /></td>
		</tr>
	</table>
	</form>
<?php
if(isset($_GET['submit'])) {
	$conn=mysql_connect("localhost","root","");
	$db=mysql_select_db("PHPTEST",$conn);
	$qry = "INSERT INTO Movies (Name, Actor, Actress, Rating) VALUES ('". $_GET['name']. "', '". $_GET['actor']. "', '". $_GET['actress']. "', ". $_GET['rating']. ");";
	$result = mysql_query($qry, $conn);
	echo $result;
	if($result) {
		echo "<script>alert('Data Inserted Successfully.'); window.location = 'http://localhost/DBOperation/';</script>";
	} else {
		echo "<script>alert('Some Error Occured, Please try again...')</script>";
	}
} 
?>
<p><a href="index.php"> <-Back To Home </a></p>
</body>
</html>