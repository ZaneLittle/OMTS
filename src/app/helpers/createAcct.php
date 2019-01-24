<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "OMTSDB";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = 'SELECT MAX(account_id) as ID FROM customer limit 1';

	$acctID = 1;
	foreach($conn->query($query) as $row)
	{
		$acctID = (string) ($acctID + (int)$row['ID']);
	}

	$admin = "F";
	$email = $_POST['enterEmail'];
	$pass = $_POST['enterPassword'];
	$fname = $_POST['enterFname'];
	$lname = $_POST['enterLname'];

	//Need to check if these are null, otherwise put quotes on them
	$streetNum = $_POST['enterStreetNum'];
	if(strlen($streetNum) == 0)	{
		$streetNum = "NULL";
	}
	else	{
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

	$cardExpiry = $_POST['enterCreditExpiryYear'] . '-' . $_POST['enterCreditExpiryMonth'] . '-01';
	if(strlen($cardExpiry) == 0){
		$cardExpiry = "NULL";
	}
	else{
		$cardExpiry = '"' . $cardExpiry . '"';
	}


	//Get the password for the current user
	$query = 'INSERT INTO customer (account_id, admin, city, country, credit_expiry, credit_num, email_address, fname, lname, password, phone_num, postal_code, street_name, street_num) VALUES ('. $acctID .', "'. $admin .'", '. $city .', '. $country .', '. $cardExpiry .', '. $creditNum .', "'. $email .'", "'. $fname .'", "'. $lname .'", "'. $pass .'", '. $phone .', '. $postCode .', '. $streetName .', '. $streetNum .');';

	//Insert the value
	$conn->query($query);
}
catch(PDOException $e) 
{
	echo "Error retrieving search: " . $e->getMessage();
}
$conn = null;

echo '<script>window.location.href = "../index.php";</script>'; 

?>