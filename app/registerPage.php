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
<body class='body'>
	<header class="mainHeader">
		<a href="index.php"><img src="../resources/images/logo.png" alt="OMTS Logo" height="160" width="160"><h1 class="title">ONLINE MOVIE<br>TICKET SERVICE</h1></a>
		<table class="buttons">		
			<tr><td><a href="registerPage.php" class="registerButton">REGISTER</a></td></tr>
			<tr><td><a href="loginPage.php" class="loginButton">LOGIN</a></td></tr>
		</table>
	</header>

	<form class="registerForm">
		<table class="registerTable">
			<tr>
				<td><input type="text" name="enterEmail" class="enterEmail" placeholder="Enter Email..." required></td>
				<td><input type="password" name="enterPassword" class="enterPassword" placeholder="Enter Password..." required></td>
			</tr>
			<tr>
				<td><input type="text" name="enterFname" class="enterFname" placeholder="Enter First Name..." required></td>
				<td><input type="text" name="enterLname" class="enterLname" placeholder="Enter Last Name..." required></td>
			</tr>
			<tr>
				<td><input type="text" name="enterStreetNum" class="enterStreetNum" placeholder="Enter Street Number..."></td>
				<td><input type="text" name="enterStreetName" class="enterStreetName" placeholder="Enter Street Name..."></td>
			</tr>
			<tr><td><input type="text" name="enterPostCode" class="enterPostCode" placeholder="Enter Postal Code..."></td></tr>
			<tr>
				<td><input type="text" name="enterCountry" class="enterCountry" placeholder="Enter Country..."></td>
				<td><input type="text" name="enterCity" class="enterCity" placeholder="Enter City..."></td>
			</tr>
			<tr>
				<td><input type="text" name="enterPhone" class="enterPhone" placeholder="Enter Phone Number..."></td>
			</tr>
			<tr>
				<td><input type="text" name="enterCreditNum" class="enterCreditNum" placeholder="Enter Credit Card Number..."></td>
			</tr>
			<tr>
				<td><input type="text" name="enterCreditExpiryYear" class="enterCreditExpiryYear" placeholder="Enter Card Expiry Year..."></td>
				<td><input type="text" name="enterCreditExpiryMonth" class="enterCreditExpiryMonth" placeholder="Enter Card Expiry Month..."></td>
			</tr>
			<tr>
				<td><button class="submitRegisterInfo" type="submit" onclick="return register()">Regsiter</button></td>
			</tr>
		</table>
	</form>
</body>