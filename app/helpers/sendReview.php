<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$movie = $_POST['movieName'];
	$text = $_POST['text'];

	//Cookies was used for printing name so processing needs to be done to get
	//the fname and lname
	$name = explode(' ', $_COOKIE['omtsName']);

	if(isset($_COOKIE['omtsEmail']))
	{
		$email = $_COOKIE['omtsEmail'];
	
	
		//Update the reviews
		$query = 'INSERT INTO review (account_id, movie_title, review_contents, time_posted) VALUES ((SELECT account_id FROM customer WHERE email_address = "'. $email .'"), "'. $movie .'", "'. $text .'", NOW());';

		//Execute the query
		if ($conn->query($query) == TRUE) 
		{
	    	echo "New record created successfully')";
		} 
		else 
		{
	    	echo "Error: " . $query . "<br>" . $conn->error;
		}
	}
}
catch(PDOException $e) 
{
	echo "Error retrieving search: " . $e->getMessage();
}
$conn = null;
?>