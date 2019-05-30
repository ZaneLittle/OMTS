<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$email = $_GET['email'];
	$pass = $_GET['pass'];

	//Get the password for the current user
	$query = 'SELECT password, fname, lname, admin FROM customer as C WHERE C.email_address = "'. $email .'" limit 1;';

	$count = 0;
	//Loop through the theatres and create an option for each one
	foreach($conn->query($query) as $row)
	{
		$count++;
		//Check if the password matches
		if($row['password'] != $pass)
		{
			echo 'FAILED';
		}
		else if($row['password'] == $pass)
		{
			$t = time()+60*60*24*365;
			//Create the cookies
			setcookie("omtsEmail", $email, $t, '/');
			setcookie("omtsPass", $pass, $t, '/');
			setcookie("omtsName", $row['fname'] . ' ' . $row['lname'], $t, '/');
			setcookie("omtsAdmin", $row['admin'], $t, '/');

			echo 'SUCCESS';
		}
		else
		{
			echo 'ERROR';
		}
	}

	//No results
	if($count == 0)
	{
		echo 'FAILED';
	}
}
catch(PDOException $e) 
{
	echo "Error retrieving search: " . $e->getMessage();
}
$conn = null;

?>