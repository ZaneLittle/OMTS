<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Select all theatres
	$query = "SELECT theatre_name FROM theatre_complex";

	//Start the options with all
	echo '<option value="All">All</option>';

	//Loop through the theatres and create an option for each one
	foreach($conn->query($query) as $row)
	{
		echo '<option value="'. $row[0] .'">'. $row[0] .'</option>';
	}
}
catch(PDOException $e) 
{
	echo "Error retrieving search: " . $e->getMessage();
}
$conn = null;
?>