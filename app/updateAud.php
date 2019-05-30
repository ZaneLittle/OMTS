<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(isset($_POST['updateAud']))
	{
		$stmt = "UPDATE theatre
			SET theatre_num = '" . $_POST['theatre_num'] . "',
				max_seats = '" . $_POST['max_seats'] . "',
				screen_size = '" . $_POST['screen_size'] . "' 
				WHERE " . $_POST['old_entry'] . ";";

		$conn->query($stmt);

		echo '<script>window.alert("Updated Info");</script>';
	}
	else if(isset($_POST['removeBtn']))
	{
		$stmt = "DELETE FROM theatre WHERE " . $_POST['old_entry'] . ";";

		$conn->query($stmt);

		echo '<script>window.alert("Deleted Theatre");</script>';
	}
	else if(isset($_POST['addAud']))
	{
		$stmt = "INSERT INTO theatre VALUES 
			('". $_POST['theatre_num'] ."', 
			'". $_POST['max_seats'] ."',
			'". $_POST['screen_size'] ."',
			'". $_POST['theatre_name'] ."');";

		$conn->query($stmt);

		echo '<script>window.alert("Added Theatre");</script>';
	}

}
catch(PDOException $e) 
{
	echo "Error: " . $e->getMessage();
}
$conn = null;
echo '<script>window.location.href = "accountPage.php";</script>';
?>