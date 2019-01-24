<!DOCTYPE html>
<html lang="en">

<head>
	<title>OMTS</title>
	<link rel="icon" href="./resources/images/logo.png">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="./resources/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Faster+One|Roboto+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Faster+One|Monoton|Roboto+Condensed" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="./resources/js/func.js"></script>
</head>
<body class="body">
	<header class="mainHeader">
		<h1 class="title"><a href="loggedInHome.php">ONLINE MOVIE<br>TICKET SERVICE</a></h1>
		<table class="buttons">		
			<tr><td><a href="accountPage.php" class="accountButton">ACCOUNT</a></td></tr>
			<tr><td><a href="#" class="logoutButton" onclick="logout()">LOGOUT</a></td></tr>
		</table>
	</header>

<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "OMTSDB";

try
{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	//Set PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$email = "'" . $_COOKIE['omtsEmail'] . "'";
	$stmt = "SELECT * FROM customer WHERE email_address = $email";

	//execute and construct form
	foreach($conn->query($stmt) as $user)
	{
		echo'
<form class="updateForm">
	<table class="editUserTable">
		<tr>
			<td><input type="text" name="enterEmail" class="enterEmail" value="' . $user[10] . '" required/><br>Email</td>
			<td><input type="password" name="enterPassword" class="enterPassword" value="' . $user[3] . '" required/><br>Password</td>
		</tr>
		<tr>
			<td><input type="text" name="enterFname" class="enterFname" value="' . $user[0] .'"required/><br>First Name</td>
			<td><input type="text" name="enterLname" class="enterLname"  value="' . $user[1] .'" required/><br>Last Name</td>
		</tr>
		<tr>
			<td><input type="text" name="enterStreetNum" class="enterStreetNum" value="' . $user[4] .'"/><br>Street Number</td>
			<td><input type="text" name="enterStreetName" class="enterStreetName" value="' . $user[5] .'"/><br>Street Name</td>
		</tr>
		<tr><td><input type="text" name="enterPostCode" class="enterPostCode" value="' . $user[6] .'"/><br>Postal Code</td></tr>
		<tr>
			<td><input type="text" name="enterCountry" class="enterCountry" value="' . $user[7] .'"/><br>Country</td>
			<td><input type="text" name="enterCity" class="enterCity" value="' . $user[8] .'"/><br>City</td>
		</tr>
		<tr>
			<td><input type="text" name="enterPhone" class="enterPhone" value="' . $user[9] .'"/><br>Phone Number</td>
		</tr>
		<tr>
			<td><input type="text" name="enterCreditNum" class="enterCreditNum" value="' . $user[11] .'"/><br>Credit Card Number</td>
		</tr>
		<tr>
			<td><input type="text" name="enterCreditExpiry" class="enterCreditExpiry" value="' . $user[12] .'"/><br>Credit Card Expiry (YYYY-MM-DD)</td>
		</tr>';
		if($_COOKIE['omtsAdmin'] == 'T')
		{
			echo'<tr><td>Admin: <input type="checkbox" name="admin" checked/></td></tr>';
		}

		echo'
		<tr>
			<td><button class="submitUpdateInfo" type="submit" onclick="return updateUser()">Submit</button></td>
		</tr></table></form>';
	}
}
catch(PDOException $e) 
{
	echo "Error retrieving search: " . $e->getMessage();
}
?>

</body>
</html>