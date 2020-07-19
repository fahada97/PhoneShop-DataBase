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
<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'phoneshop');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}

// get data from the input boxes 
$userid = $_POST['userid'];
$phoneid = $_POST['phoneid'];   

if (!$userid || !$phoneid) {
    echo "<p>You have not entered all the required information. </p>";
    exit;
}

// add slashes if add and strip slashes default is not turned on
// magic_quotes_gpc is off by default in XAMPP, add \ if value contains a quote
if (!get_magic_quotes_gpc()){
	$userid = addslashes($userid);
	$phoneid = addslashes($phoneid); 
}

// insert into contact database
$sqlString = "INSERT into tblorder (userid, phoneid)
		values	('$userid', '$phoneid')";
$result = $dbConnect->query($sqlString);
if (!$result){	
	echo ("<p>Error: Registration information was not added.</p>" .
			"<p>Error code $dbConnect->errno: $dbConnect->error. </p>");
	$dbConnect->close();
	exit;
	}

$dbConnect->close();
//** end of input processing

?>
<div id=header>
	<h1>Thank You for Ordering</h1>
</div>
<table>
	<tr>
		<td>Order ID</td>
		<td>User ID</td>
		<td>Phone Vendor</td>
		<td>Phone Name</td>
		<td>Screen Size</td>
		<td>Memory</td>
		<td>Phone Price</td>
	</tr>
<?php 
@$dbConnect = new mysqli('localhost', 'root', '', 'phoneshop');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
$data = mysqli_query(@$dbConnect, "SELECT * FROM tblorder where userid = '$userid'") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);



 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['orderid'] . "</td>";
 echo "<td>".$info['userid'] . " </td>";
$data1 = mysqli_query(@$dbConnect, "SELECT * FROM tblphone where phoneid = '$phoneid'") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);
while($info = mysqli_fetch_array( $data1 )) 
 { 
   
 echo "<td>" .$info['phone_vendor'] . "</td>";
 echo "<td>".$info['phone_name'] . " </td>";
 echo "<td>".$info['screen_size']. " </td>";
 echo "<td>".$info['memory']. " </td>";
 echo "<td>".$info['phone_price']. " </td>";
 
 } 
 echo "</tr>";
 } 


include'phone-backtologin.html';
?>
</body>
</html>
