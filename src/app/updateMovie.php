<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "OMTSDB";

try{
	if(isset($_POST['movie_title']))
	{
		$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = 'UPDATE movie
			SET movie_title = "' . $_POST['movie_title'] . '", 
				rating = "' . $_POST['rating'] . '", 
				plot = "' . $_POST['plot'] . '", 
				director_fname = "' . $_POST['director_fname'] . '", 
				director_lname = "' . $_POST['director_lname'] . '", 
				prod_company = "' . $_POST['prod_company'] . '" 
			WHERE movie_title = "' . $_POST['old_movie_title'] . '";';
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