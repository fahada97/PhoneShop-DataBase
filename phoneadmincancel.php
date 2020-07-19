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
$cancelorderid = $_POST['cancelorderid'];  

if (!$cancelorderid) {
    echo "<p>You have not entered all the required information. </p>";
    exit;
}

// add slashes if add and strip slashes default is not turned on
// magic_quotes_gpc is off by default in XAMPP, add \ if value contains a quote
if (!get_magic_quotes_gpc()){	
	$cancelorderid = addslashes($cancelorderid);

}

// insert into contact database
$sqlString = mysqli_query(@$dbConnect,"delete from tblorder where orderid = '$cancelorderid'");



$sqlString1 = mysqli_query(@$dbConnect,"delete from tblcancel where cancelorderid = '$cancelorderid'");

$dbConnect->close();
//** end of input processing
?>
<h1>Order canceled<h1>
<?php
include'phone-adminview.html';
?>

</body>
</html>
