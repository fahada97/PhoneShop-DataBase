<!DOCTYPE html>
<html>
<head>
<style tyle="text/css">
h1 {
	text-align: center;
	}
table {
	text-align: center;
	vertical-align: middle;
	border: 2px solid black;
	border-collapse: collapse;
	margin: 20px auto;
	font-family: Verdana, Helvetica, serif;
	}
table tr:nth-child(even) {
	background-color: #ccc;
	}
table tr:first-child {
	border-bottom: 2px solid black;
	font-weight: bold;
	}
td {
	padding: 5px 15px 5px 15px;
	border: 1px solid black;
	}
</style>
</head>
<body>

<div id=header>
	<h1>Thank You for Registering</h1>
</div>
<table>
	<tr>
		<td>User Id</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Phone</td>
		<td>Type</td>
<h1>Customers</h1>
	</tr>



<?php

@$dbConnect = new mysqli('localhost', 'root', '', 'phoneshop');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}

$data = mysqli_query(@$dbConnect, "SELECT * FROM tbluser where type = 'user' order by userId desc") 
 or die("Unable to select data 1"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['userid'] . "</td>";
 echo "<td>".$info['firstname'] . " </td>";
 echo "<td>".$info['lastname']. " </td>";
 echo "<td>" .$info['email']. " </td>";
 echo "<td>" .$info['phone']. " </td>";
 echo "<td>" .$info['type']. " </td>";
 echo "</tr>";
 }
include'phonebacktoadminview.html';

?>



</table>
</body>
</html>