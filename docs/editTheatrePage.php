<!DOCTYPE html>
<html lang="en">

<head>
	<title>OMTS</title>
	<link rel="icon" href="./resources/images/logo.png">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="./resources/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Faster+One|Roboto+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Faster+One|Monoton|Roboto+Condensed" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="./resources/js/func.js"></script>
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

	$theatre_name = $_GET['theatre_name'];

	$stmt = "SELECT * FROM theatre_complex WHERE theatre_name = '" . $theatre_name . "';";

	foreach($conn->query($stmt) as $row)
	{
		echo '
		<form class="theatreUpdateForm">
			<table class="editTheatreTable">
				<tr>
					<td>Theatre Name<br><input type="text" name="theatre_name" class="enterName" value="'. $row['theatre_name'] .'" required/></td>
				</tr>
				<tr>
					<td>Phone Number<br><input type="text" name="phone_num" class="enterPhone" value="'. $row['phone_num'] .'"/></td>
				</tr>		
				<tr>
					<td>Street Number<br><input type="text" name="street_num" class="streetNum" value="'. $row['street_num'] .'"/></td>
					<td>Street Name<br><input type="text" name="street_name" class="streetName" value="'. $row['street_name'] .'"/></td>
				</tr>		
				<tr>
					<td>Postal Code<br><input type="text" name="postal_code" class="enterPostCode" value="'. $row['postal_code'] .'"/></td>
				</tr>		
				<tr>
					<td>Country<br><input type="text" name="country" class="enterCountry" value="'. $row['country'] .'"/></td>
					<td>City<br><input type="text" name="city" class="enterCity" value="'. $row['city'] .'"/></td>
				</tr>
				<tr>
					<td style="display:none;"><input type="text" name="old_theatre_name" class="old_theatre_name" value="'. $theatre_name .'"/></td>
					<td><button class="submitUpdateTheatre" type="submit" onclick="return updateTheatre()">Submit</button></td>
				</tr>
			</table>
		</form>';
	}


	$stmt = "SELECT * FROM theatre WHERE theatre_name = '". $theatre_name ."';";

	echo '<br><br><table class="audTable">';

	foreach($conn->query($stmt) as $row)
	{
		echo '
		<form action="updateAud.php" method="post">
			<table class="editAudTable">
				<tr>
					<td>Theatre Number<br><input type="text" name="theatre_num" class="enterNum" value="'. $row['theatre_num'] .'" required/></td>
					<td>Capacity<br><input type="text" name="max_seats" class="maxSeats" value="'. $row['max_seats'] .'"/></td>
					<td>Screen Size<br><input type="text" name="screen_size" class="screenSize" value="'. $row['screen_size'] .'"/></td>
					<td><br><button class="submitAudChange" type="submit" name="updateAud">Submit</button></td>
					<td style="display:none;"><input type="text" name="old_entry" class="oldEntry" value="theatre_name=\'' . $theatre_name . '\' and theatre_num=\'' . $row['theatre_num'] . '\'"/></td>
					<td><br><button class="removeAud" name="removeBtn" type="submit">Remove</button></td>	
				</tr>
			</table>
		</form>';

		$movieStmt = 'SELECT * FROM showings as S WHERE S.theatre_name = "'. $theatre_name .'" AND S.theatre_num = "'. $row['theatre_num'] .'" ORDER BY start_time;';

		echo '
		
			
				<table class="editMovieTable">
	';

		foreach($conn->query($movieStmt) as $movieRow)
		{
			echo '
			<tr class="movieRow">
				<td>
					<form action="updateShowing.php" method="post">
						<table style="padding-left:5%">
							<tr>
								<th>Movie Title</th>
								<th>Theatre Number</th>
								<th>Start Time</th>
								<th>Seats Available</th>
							</tr>
							<tr>
								<td><input type="text" name="movie_title" class="enterMovie" value="'. $movieRow['movie_title'] .'" required/></td>
								<td><input type="text" name="theatre_num" class="theatreNum" value="'. $movieRow['theatre_num'] .'" required/></td>
								<td><input type="text" name="start_time" class="startTime" value="'. $movieRow['start_time'] .'" required/></td>
								<td><input type="text" name="seats_available" class="seatsAvailable" value="'. $movieRow['seats_available'] .'"/></td>
								<td style="display:none;"><input type="text" name="old_entry" class="oldEntry" value="theatre_name=\'' . $theatre_name . '\' and theatre_num=\'' . $movieRow['theatre_num'] . '\' and movie_title=\'' . $movieRow['movie_title'] . '\'"/></td>
								<td><button name="submitBtn" class="submitMovieChange" type="submit">Submit</button></td>
								<td><button class="removeMovie" name="removeBtn" type="submit">Remove</button></td>		
							</tr>
						</table>	
					</form>												
				</td>
			</tr>
			';
		}

		echo '		
		</table>
			
		';

	}
	echo '
		<p>Add Theatre</p>
		<form action="updateAud.php" method="post">
			<table class="editAudTable">
				<tr>
					<td>Theatre Number<br><input type="text" name="theatre_num" class="enterNum" value="" placeholder="Enter Theatre Number..." required/></td>
					<td>Capacity<br><input type="text" name="max_seats" class="maxSeats" value="" placeholder="Enter Theatre Capacity..."/></td>
					<td>Screen Size<br><input type="text" name="screen_size" class="screenSize" value="" placeholder="Enter Screen Size..."/></td>
					<td style="display:none;"><input type="text" name="theatre_name" class="theatre_name" value="'. $theatre_name .'"/></td>
					<td><br><button class="submitAudChange" type="submit" name="addAud">Add</button></td>
				</tr>
			</table>
		</form>';

	echo '
		<p>Add Showing</p>
		<form action="updateShowing.php" method="post">
			<table>
				<tr>
					<td>Movie Title<br><input type="text" name="movie_title" class="enterMovie" value="" placeholder="Enter Movie Name..." required/></td>
					<td>Theatre Number<br><input type="text" name="theatre_num" class="theatreNum" value="" placeholder="Enter Theatre Number..." required/></td>
					<td>Start Time (HH:MM:SS)<br><input type="text" name="start_time" class="startTime" value="" placeholder="Enter Start Time..." required/></td>
					<td>Seats Available<br><input type="text" name="seats_available" class="seatsAvailable" value="" placeholder="Enter Seats Available..."/></td>
					<td style="display:none;"><input type="text" name="theatre_name" class="theatre_name" value="'. $theatre_name .'"/></td>
					<td><br><button class="submitMovieChange" name="addMovie" type="submit">Add</button></td>
				</tr>
			</table>	
		</form>	';

	echo '</table>';

}
catch(PDOException $e) 
{
	echo "Error retrieving search: " . $e->getMessage();
}
$conn = null;

?>
</body>
</html>