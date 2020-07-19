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
$phoneid = $_POST['phoneid'];

if (!$phoneid) {
    echo "<p>You have not entered all the required information. </p>";
    exit;
}

// add slashes if add and strip slashes default is not turned on
// magic_quotes_gpc is off by default in XAMPP, add \ if value contains a quote
if (!get_magic_quotes_gpc()){
	$phoneid = addslashes($phoneid);
}

// insert into contact database
$sqlString = "Delete from tblphone where phoneid = '$phoneid'";
$result = $dbConnect->query($sqlString);
if (!$result){	
	echo ("<p>Error: Phone information was not deleted.</p>" .
			"<p>Error code $dbConnect->errno: $dbConnect->error. </p>");
	$dbConnect->close();
	exit;
	}

$dbConnect->close();
//** end of input processing
include'phonephoneshow.php';
exit;
?>

</body>
</html>
