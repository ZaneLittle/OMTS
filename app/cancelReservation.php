<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(isset($_POST['cancelReservation']))
	{
		$stmt = 'SELECT account_id FROM customer WHERE email_address = "'. $_COOKIE['omtsEmail'] .'";';
		$accID = 0;

		foreach($conn->query($stmt) as $row)
		{
			$accID = $row['account_id'];
		}

		$stmt = 'DELETE FROM reservation WHERE account_id = '. $accID .' and theatre_name = "'. $_POST['theatre_name'] .'" and theatre_num = "'. $_POST['theatre_num'] .'" and start_time = "'. $_POST['start_time'] .'" and showing_date = "'. $_POST['showing_date'] .'" and movie_title = "'. $_POST['movie_title'] .'" and ticket_num = "'. $_POST['ticket_num'] .'";';

		$conn->query($stmt);

		echo '<script>window.alert("Cancelled Reservation");</script>';
	}
}
catch(PDOException $e) 
{
	echo "Error: " . $e->getMessage();
}
$conn = null;
echo '<script>window.location.href = "accountPage.php";</script>';
?>