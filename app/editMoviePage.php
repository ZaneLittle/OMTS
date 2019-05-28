<!DOCTYPE html>
<html lang="en">

<head>
	<title>OMTS</title>
	<link rel="icon" href="../resources/images/logo.png">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="../resources/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Faster+One|Roboto+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Faster+One|Monoton|Roboto+Condensed" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../resources/js/func.js"></script>
</head>
<body class="body">
	<header class="mainHeader">
		<h1 class="title"><a href="loggedInHome.php">ONLINE MOVIE<br>TICKET SERVICE</a></h1>
		<table class="buttons">		
			<tr><td><a href="accountPage.php" class="accountButton">ACCOUNT</a></td></tr>
			<tr><td><a href="#" class="logoutButton" onclick="logout()">LOGOUT</a></td></tr>
		</table>
	</header>
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "OMTSDB";

try
{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$movie_title = $_GET['movie_title'];
	$stmt = "SELECT * FROM movie WHERE movie_title = '" . $movie_title . "';";

	foreach($conn->query($stmt) as $row)
	{
		echo '
		<form class="movieUpdateForm">
			<table class="editMovieTable">
				<tr>
					<td>Movie Title<br><input type="text" name="movie_title" class="enterTitle" value="'. $row['movie_title'] .'" required/></td>
				</tr>
				<tr>
					<td>Rating<br><input type="text" name="rating" class="enterRating" value="'. $row['rating'] .'"/></td>
				</tr>		
				<tr>
					<td>Plot<br><input type="textarea" rows="3" name="plot" class="enterPlot" value="'. $row['plot'] .'"/></td>
				</tr>		
				<tr>
					<td>Director<br><input type="text" name="director_fname" class="enterDFname" value="'. $row['director_fname'] .'"/></td>
					<td><br><input type="text" name="director_lname" class="enterDLname" value="'. $row['director_lname'] .'"/></td>
				</tr>		
				<tr>
					<td>Country<br><input type="text" name="prod_company" class="enterProdCompany" value="'. $row['prod_company'] .'"/></td>
				</tr>
				<tr>
					<td style="display:none;"><input type="text" name="old_movie_title" class="old_movie_title" value="'. $movie_title .'"/></td>
					<td><button class="submitUpdateMovie" type="submit" onclick="return updateMovie()">Submit</button></td>
				</tr>
			</table>
		</form>';
	}
}
catch(PDOException $e) 
{
	echo "Error retrieving search: " . $e->getMessage();
}
$conn = null;
?>


</body>
</html>