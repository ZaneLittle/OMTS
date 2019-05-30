<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = 'SELECT COUNT(account_id) as ID FROM customer limit 1';

	$acctID = 1;
	foreach($conn->query($query) as $row)
	{
		$acctID = (string) ($acctID + (int)$row['ID']);
	}

	$admin = "F";
	if(isset($_POST['admin']))
	{
		$admin = 'T';
	} 
	else
	{
		$admin = 'F';
	}
	$email = $_POST['enterEmail'];
	// See if email has changed
	if ($email != $_COOKIE['omtsEmail'])
	{
		//Check to make sure this is a valid email and has not been taken
		$query = 'SELECT COUNT(email_address) as count FROM customer as C WHERE C.email_address = "'. $email .'";';

		foreach($conn->query($query) as $row)
		{
			//Check if the password matches
			if($row['count'] > 0)
			{
				throw new Exception("Email is already in use");
			}
			else if($row['count'] == 0)
			{
				//If it was good info, log them in
				setcookie("omtsEmail", $email, $t, '/');
				setcookie("omtsPass", $pass, $t, '/');
				setcookie("omtsName", $_POST['fname'] . ' ' . $_POST['lname'], $t, '/');
				setcookie("omtsAdmin", $_POST['admin'], $t, '/');
			}
		}
	}
	$pass = $_POST['enterPassword'];
	$fname = $_POST['enterFname'];
	$lname = $_POST['enterLname'];

	//Need to check if these are null, otherwise put quotes on them
	$streetNum = $_POST['enterStreetNum'];
	if(strlen($streetNum) == 0)	{
		$streetNum = "NULL";
	}
	else{
		$streetNum = '"' . $streetNum . '"';
	}

	$streetName = $_POST['enterStreetName'];
	if(strlen($streetName) == 0){
		$streetName = "NULL";
	}
	else{
		$streetName = '"' . $streetName . '"';
	}

	$postCode = $_POST['enterPostCode'];
	if(strlen($postCode) == 0){
		$postCode = "NULL";
	}
	else{
		$postCode = '"' . $postCode . '"';
	}

	$country = $_POST['enterCountry'];
	if(strlen($country) == 0){
		$country = "NULL";
	}
	else{
		$country = '"' . $country . '"';
	}

	$city = $_POST['enterCity'];
	if(strlen($city) == 0){
		$city = "NULL";
	}
	else{
		$city = '"' . $city . '"';
	}

	$phone = $_POST['enterPhone'];
	if(strlen($phone) == 0){
		$phone = "NULL";
	}
	else{
		$phone = '"' . $phone . '"';
	}

	$creditNum = $_POST['enterCreditNum'];
	if(strlen($creditNum) == 0){
		$creditNum = "NULL";
	}
	else{
		$creditNum = '"' . $creditNum . '"';
	}

	$cardExpiry = $_POST['enterCreditExpiry'];
	if(strlen($cardExpiry) == 0){
		$cardExpiry = "NULL";
	}
	else{
		$cardExpiry = '"' . $cardExpiry . '"';
	}


	// construct query
	$query = 'UPDATE customer 
		SET admin = "' . $admin . '", 
			city = ' . $city . ', 
			country = ' . $country . ', 
			credit_expiry = ' . $cardExpiry . ', 
			credit_num = ' . $creditNum . ', 
			email_address = "' . $email . '", 
			fname = "' . $fname . '", 
			lname = "' . $lname . '", 
			password = "' . $pass . '", 
			phone_num = ' . $phone . ', 
			postal_code = ' . $postCode . ', 
			street_name = ' . $streetName . ', 
			street_num = ' . $streetNum . '
		WHERE email_address = "' . $email . '";';

	// execute query
	$conn->query($query);

	echo '<script>window.alert("Updated Info");</script>';
}
catch(PDOException $e) 
{
	echo "Error: " . $e->getMessage();
}
$conn = null;
echo '<script>window.location.href = "updateProfile.php";</script>';
?>