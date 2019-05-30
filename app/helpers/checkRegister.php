<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$email = $_GET['email'];

	//Get the password for the current user
	$query = 'SELECT COUNT(email_address) as count FROM customer as C WHERE C.email_address = "'. $email .'";';

	//Loop through the theatres and create an option for each one
	foreach($conn->query($query) as $row)
	{
		//Check if the password matches
		if($row['count'] > 0)
		{
			echo 'FAILED';
		}
		else if($row['count'] == 0)
		{
			$t = time()+60*60*24*365;

			//If it was good info, log them in
			setcookie("omtsEmail", $email, $t, '/');
			setcookie("omtsPass", $_GET['pass'], $t, '/');
			setcookie("omtsName", $_GET['fname'] . ' ' . $_GET['lname'], $t, '/');
			setcookie("omtsAdmin", "F", $t, '/');

			echo 'SUCCESS';
		}
	}
}
catch(PDOException $e) 
{
	echo "Error retrieving search: " . $e->getMessage();
}
$conn = null;

?>