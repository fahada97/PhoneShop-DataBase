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


<table>
	<tr>
		<td>Order ID</td>
		<td>User ID</td>
		<td>Phone ID</td>
		<td>Phone Vendor</td>
		<td>Phone Name</td>
		<td>Memory</td>
		<td>Screen Size</td>
		<td>Phone Price</td>
<h1>Orders</h1>
	</tr>



<?php

@$dbConnect = new mysqli('localhost', 'root', '', 'phoneshop');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
$data = mysqli_query(@$dbConnect, "SELECT * FROM tblorder") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['orderid'] . "</td>";
 echo "<td>".$info['userid'] . " </td>";
$userid = $info['userid'];

$phone = mysqli_query(@$dbConnect, "SELECT phoneid FROM tblorder where userid = '$userid'") 
 or die("Unable to select data 3"); 
 #$info = mysqli_fetch_array($data);

while($info = mysqli_fetch_array( $phone )) 
 {  
   $info['phoneid']  ;
$phoneid = $info['phoneid'];
}
 

$data1 = mysqli_query(@$dbConnect, "SELECT * FROM tblphone where phoneid = '$phoneid'")
 or die("Unable to select data 4");

while ($info = mysqli_fetch_array($data1))
{
 echo "<td>" .$info['phoneid'] . "</td>";
 echo "<td>".$info['phone_vendor'] . " </td>";
 echo "<td>".$info['phone_name'] . " </td>";
 echo "<td>".$info['memory'] . " </td>";
 echo "<td>".$info['screen_size'] . " </td>";
 echo "<td>".$info['phone_price'] . " </td>";
}
}
?>

<table>
	
	<tr>
		<td>Cancel Order ID</td>
	</tr>
<h1>Cancel Requests</h1>
<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'phoneshop');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
$data = mysqli_query(@$dbConnect, "SELECT * FROM tblcancel") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
  echo "<tr>";  
 echo "<td>" .$info['cancelorderid'] . "</td>";
 echo "</tr>"; } 


include'phoneadmincancel.html';

include'phonebacktoadminview.html';

?>



</table>
</body>
</html>