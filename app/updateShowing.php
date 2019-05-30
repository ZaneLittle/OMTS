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
		$stmt = "UPDATE showings
			SET movie_title = '" . $_POST['movie_title'] . "',
				theatre_num = '" . $_POST['theatre_num'] . "',
				start_time = '" . $_POST['start_time'] . "',
				seats_available = '" . $_POST['seats_available'] . "'
				WHERE " . $_POST['old_entry'] . ";";

		$conn->query($stmt);

		echo '<script>window.alert("Updated Info");</script>';
	}
	else if(isset($_POST['removeBtn']))
	{
		$stmt = "DELETE FROM showings WHERE " . $_POST['old_entry'] . ";";

		$conn->query($stmt);

		echo '<script>window.alert("Deleted Showing");</script>';
	}
	else if(isset($_POST['addMovie']))
	{
		$stmt = "INSERT INTO showings VALUES 
			('". $_POST['start_time'] ."', 
			'". $_POST['theatre_num'] ."',
			'". $_POST['seats_available'] ."',
			'". $_POST['movie_title'] ."',
			'". $_POST['theatre_name'] ."');";

		$conn->query($stmt);

		echo '<script>window.alert("Added Showing");</script>';
	}

}
catch(PDOException $e) 
{
	echo "Error: " . $e->getMessage();
}
$conn = null;
echo '<script>window.location.href = "accountPage.php";</script>';
?>