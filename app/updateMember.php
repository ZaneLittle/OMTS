<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(isset($_POST['submitBtn']))
	{
		$emailGood = true;
		if($_POST['oldEmail'] != $_POST['enterEmail'])
		{
			$stmt = "SELECT COUNT(account_id) as C from customer where email_address = '". $_POST['enterEmail'] ."';";

			foreach($conn->query($stmt) as $row)
			{
				if($row['C'] > 0)
				{
					$emailGood = false;
					echo '<script>window.alert("Email Already in use");</script>';
				}
			}
		}

		if($emailGood)
		{
			$ad = (isset($_POST['admin']))?('T'):('F');
			$stmt = 'UPDATE customer 
				SET admin = "' . $ad . '", 
					city = "' . $_POST['enterCity'] . '", 
					country = "' . $_POST['enterCountry'] . '", 
					credit_expiry = "' . $_POST['enterCreditExpiry'] . '", 
					credit_num = "' . $_POST['enterCreditNum'] . '", 
					email_address = "' . $_POST['enterEmail'] . '", 
					fname = "' . $_POST['enterFname'] . '", 
					lname = "' . $_POST['enterLname'] . '", 
					password = "' . $_POST['enterPassword'] . '", 
					phone_num = "' . $_POST['enterPhone'] . '", 
					postal_code = "' . $_POST['enterPostCode'] . '", 
					street_name = "' . $_POST['enterStreetName'] . '", 
					street_num = "' . $_POST['enterStreetNum'] . '"
					WHERE email_address = "' . $_POST['oldEmail'] . '";';

			$conn->query($stmt);

			echo '<script>window.alert("Updated Info");</script>';

		}
	}
	else if(isset($_POST['removeBtn']))
	{
		$stmt = "DELETE FROM customer WHERE email_address = '" . $_POST['oldEmail'] . "';";

		$conn->query($stmt);

		echo '<script>window.alert("Deleted Member");</script>';
	}
}
catch(PDOException $e) 
{
	echo "Error: " . $e->getMessage();
}
$conn = null;
echo '<script>window.location.href = "accountPage.php";</script>';
?>