<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "OMTSDB";

try{
	if(isset($_POST['theatre_name']))
	{
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = "UPDATE theatre_complex
			SET theatre_name = '" . $_POST['theatre_name'] . "',
				phone_num = '" . $_POST['phone_num'] . "',
				street_num = '" . $_POST['street_num'] . "',
				street_name = '" . $_POST['street_name'] . "',
				postal_code = '" . $_POST['postal_code'] . "',
				country = '" . $_POST['country'] . "',
				city = '" . $_POST['city'] . "'
				WHERE theatre_name = '" . $_POST['old_theatre_name'] . "';";
		$conn->query($stmt);
		echo '<script>window.alert("Updated Info");</script>';
	}
}
catch(PDOException $e) 
{
	echo "Error: " . $e->getMessage();
}
$conn = null;
echo '<script>window.location.href = "accountPage.php";</script>';
?>