<!DOCTYPE html>
<html lang="en">

<head>
	<title>OMTS</title>
	<link rel="icon" href="../resources/images/logo.png">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="../resources/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Faster+One|Roboto+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Faster+One|Monoton|Roboto+Condensed" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../resources/js/func.js"></script>
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
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try
{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$email = $_GET['email_address'];

	$stmt = "SELECT * FROM customer WHERE email_address = '". $email ."';";

	foreach($conn->query($stmt) as $user)
	{
		$a = ($user['admin'] == 'T')?('checked'):('');
		echo'
			<form action="updateMember.php" method="post">
				<table class="editUserTable">
					<tr>
						<td>Email<br><input type="text" name="enterEmail" class="enterEmail" value="' . $user[10] . '" required/></td>
						<td style="display:none;"><input type="text" name="oldEmail" class="enterEmail" value="' . $user[10] . '"/></td>
						<td>Password<br><input type="password" name="enterPassword" class="enterPassword" value="' . $user[3] . '" required/></td>
					</tr>
					<tr>
						<td>First Name<br><input type="text" name="enterFname" class="enterFname" value="' . $user[0] .'"required/></td>
						<td>Last Name<br><input type="text" name="enterLname" class="enterLname"  value="' . $user[1] .'" required/></td>
					</tr>
					<tr>
						<td>Street Number<br><input type="text" name="enterStreetNum" class="enterStreetNum" value="' . $user[4] .'"/></td>
						<td>Street Name<br><input type="text" name="enterStreetName" class="enterStreetName" value="' . $user[5] .'"/></td>
					</tr>
					<tr><td>Postal Code<br><input type="text" name="enterPostCode" class="enterPostCode" value="' . $user[6] .'"/></td></tr>
					<tr>
						<td>Country<br><input type="text" name="enterCountry" class="enterCountry" value="' . $user[7] .'"/></td>
						<td>City<br><input type="text" name="enterCity" class="enterCity" value="' . $user[8] .'"/></td>
					</tr>
					<tr>
						<td>Phone Number<br><input type="text" name="enterPhone" class="enterPhone" value="' . $user[9] .'"/></td>
					</tr>
					<tr>
						<td>Credit Card Number<br><input type="text" name="enterCreditNum" class="enterCreditNum" value="' . $user[11] .'"/></td>
					</tr>
					<tr>
						<td>Credit Card Expiry (YYYY-MM-DD)<br><input type="text" name="enterCreditExpiry" class="enterCreditExpiry" value="' . $user[12] .'"/></td>
					</tr>
					<tr><td>Admin: <input type="checkbox" name="admin" '. $a .'/></td></tr>
					<tr>
						<td><button class="changeMemberInfoBtn" type="submit" name="submitBtn">Submit</button></td>
					</tr>
					<tr>
						<td><button class="removeMemberBtn" type="submit" name="removeBtn">remove</button></td>
					</tr>
				</table>
			</form><br><br>';
	}

	$stmt = "SELECT movie_title, theatre_name, theatre_num, start_time, showing_date, ticket_num from reservation as R, customer as C WHERE C.account_id = R.account_id and C.email_address = '". $email ."' order by showing_date desc, start_time desc;";

	echo '
		<table>
			<tr>
				<th>Movie Title</th>
				<th>Theatre Name</th>
				<th>Theatre Number</th>
				<th>Start Time</th>
				<th>Showing Date</th>
				<th>#</th>
			</tr>';

	foreach($conn->query($stmt) as $row)
	{
		echo '
			<tr>
				<td>'. $row['movie_title'] .'</td>
				<td>'. $row['theatre_name'] .'</td>
				<td>'. $row['theatre_num'] .'</td>
				<td>'. $row['start_time'] .'</td>
				<td>'. $row['showing_date'] .'</td>
				<td>'. $row['ticket_num'] .'</td>
			</tr>';
	}

	echo '</table>';



}
catch(PDOException $e) 
{
	echo "Error retrieving search: " . $e->getMessage();
}
$conn = null;

?>
</body>
</html>