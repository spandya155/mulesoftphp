<html>
<head>
	<title>Edit Movies Details</title>
	<link rel="stylesheet" href="css/Styles.css" type="text/css" />
</head>
<body>
	<h1>Update Existing Movies</h1>
	<form action='#'>
<?php
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$conn = mysql_connect("localhost","root","");
	$db = mysql_select_db("PHPTEST",$conn);
	$qry = "SELECT * FROM Movies WHERE id = $id;";
	$result = mysql_query($qry, $conn);
	if(mysql_num_rows($result) == 1) {
		$row = mysql_fetch_array($result);
	echo "
	<table>
		<tr>
			<th colspan=2>Update Following Details:</th>
		</tr>
		<tr>
			<td>ID:</td>
			<td>$row[0] <input type='hidden' name='id' value='$row[0]' /></td>
		</tr>
		<tr>
			<td>Name:</td>
			<td><input type='text' name='name' value='$row[1]' /></td>
		</tr>
		<tr>
			<td>Actor:</td>
			<td><input type='text' name='actor' value='$row[2]' /></td>
		</tr>
		<tr>
			<td>Actress:</td>
			<td><input type='text' name='actress' value='$row[3]' /></td>
		</tr>
		<tr>
			<td>Rating:</td>
			<td><input type='text' name='rating' value='$row[4]' /></td>
		</tr>
		<tr>
			<td><input type='submit' name='submit' value='Update' /></td>
			<td></td>
		</tr>
	</table>";
	}
}  else {
	echo "<script>alert('Some Error Occurred.'); window.location = 'http://localhost/DBOperation/';</script>";
}

if(isset($_GET['submit'])) {
	$conn = mysql_connect("localhost","root","");
	$db = mysql_select_db("PHPTEST",$conn);
	$qry = "UPDATE Movies SET 
		Name='". $_GET['name']. "',
		Actor='". $_GET['actor']. "',
		Actress='". $_GET['actress']. "',
		Rating='". $_GET['rating']. "' WHERE id = ". $_GET['id']. ";";
	$result = mysql_query($qry, $conn);
	if($result) {
		if(mysql_affected_rows() > 0) {
			echo "<script>alert('Data Updated Successfully.'); window.location = 'http://localhost/DBOperation/';</script>";
		} else {
			echo "<script>alert('Some Error Occurred while Updation.'); window.location = 'http://localhost/DBOperation/';</script>";
		}
	} else {
		echo "<script>alert('Some Error Occurred.'); window.location = 'http://localhost/DBOperation/';</script>";
	}
}
?>
	</form>
<p><a href="index.php"> <-Back To Home </a></p>
</body>
</html>