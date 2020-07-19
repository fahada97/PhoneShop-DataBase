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
$password = $_POST['password'];
$type = $_POST['type'];

if (!$userid || !$password || !$type) {
    echo "<p>You have not entered all the required information. </p>";
    exit;
}

// add slashes if add and strip slashes default is not turned on
// magic_quotes_gpc is off by default in XAMPP, add \ if value contains a quote
if (!get_magic_quotes_gpc()){
	$userid = addslashes($userid);
	$password = addslashes($password);
	$type = addslashes($type);
}

if($userid == 1 && $password == 'admin' && $type == 'admin')
{
include'phoneadminshow.html';

 
?>

<?php
}
else
{
echo "You are not an admin";
?>

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
	</tr>
<?php

$data = mysqli_query(@$dbConnect, "SELECT * FROM tbluser where userid = '$userid' && password = '$password'") 
 or die("Unable to select data in else"); 
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
 ?>
	
<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'phoneshop');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
$data = mysqli_query(@$dbConnect, "SELECT * FROM tblorder where userid = '$userid'") 
 or die("Unable to select data 1"); 
 #$info = mysqli_fetch_array($data);

$phone = mysqli_query(@$dbConnect, "SELECT phoneid FROM tblorder where userid = '$userid'") 
 or die("Unable to select data 3"); 
 #$info = mysqli_fetch_array($data);

$countnum = mysqli_query(@$dbConnect, "SELECT count(*) AS total FROM tblorder") ;

$row = mysqli_fetch_array($countnum);

$count1 = $row['total'];

if ($count1 == 0)
{
    ?>
    <h1>No Orders Found</h1>
    <?php

    include'phoneorder.html';
    include'phone-backtologin.html';
    exit;
    ?>

}

<?php
}
else
?>

<h1>Order Information</h1>

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
{

while($info = mysqli_fetch_array( $phone )) 
 {  
   $info['phoneid']  ;
$phoneid = $info['phoneid'];
 }
 


 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['orderid'] . "</td>";
 echo "<td>".$info['userid'] . " </td>";

$data1 = mysqli_query(@$dbConnect, "SELECT phone_vendor, phone_name, screen_size, memory, phone_price FROM tblphone where phoneid = '$phoneid'") 
 or die("Unable to select data 2"); 
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
}



include'phone-cancelorder.html';


include'phoneorder.html';

include'phone-backtologin.html';
}


?>



</table>
</body>
</html>