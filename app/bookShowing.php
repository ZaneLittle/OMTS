<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$movie_title = $_POST['movie_title'];
	$theatre_name = $_POST['theatre_name'];
	$theatre_num = $_POST['theatre_num'];
	$start_time = $_POST['start_time'];
	$ticket_num = $_POST['tickets2book'];
	$seats_available = $_POST['seats_available'] - $ticket_num;
	$showing_date = $_POST['showing_date'];

	// Update seats_available
	$stmt = 'UPDATE showings
		SET seats_available = ' . $seats_available . '
		WHERE start_time = "' . $start_time .'" and
			theatre_name = "' . $theatre_name . '" and
			theatre_num = ' . $theatre_num . ';';
	$conn->query($stmt);

	// Retrieve account ID
	$acctID = "";
	$stmt = "SELECT account_id FROM customer WHERE email_address = '". $_COOKIE['omtsEmail'] ."';";
	foreach($conn->query($stmt) as $customer)
	{
		$acctID = $customer['account_id'];
	}

	// Add reservation
	$stmt = 'INSERT INTO reservation (account_id, movie_title, theatre_name, theatre_num, start_time, showing_date, ticket_num) VALUES ('. (int)$acctID .', "'. $movie_title .'", "'. $theatre_name .'", '. $theatre_num .', "'. $start_time .'", "'. $showing_date .'", '. $ticket_num .');';

	$conn->query($stmt);

	echo '<script>window.alert("Showing booked!");</script>';
	
}
catch(PDOException $e) 
{
	echo "Error: " . $e->getMessage();
}
$conn = null;
echo '<script>window.location.href = "index.php";</script>';
?>