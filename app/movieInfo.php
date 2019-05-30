<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$movie = $_GET['movieName'];

	$stmt = "SELECT * FROM movie where movie_title = '". $movie ."';";

	foreach($conn->query($stmt) as $row)
	{
		echo '
			<table>
				<tr>
					<th>Movie Title</th>
					<th>Rating</th>
					<th>Plot</th>
					<th>Director</th>
					<th>Production Company</th>
					<th>Running Time</th>
				</tr>
				<tr>
					<td>'. $movie .'</td>
					<td>'. $row['rating'] .'</td>
					<td>'. $row['plot'] .'</td>
					<td>'. $row['director_fname'] .' '. $row['director_lname'] .'</td>
					<td>'. $row['prod_company'] .'</td>
					<td>'. $row['running_time'] .'</td>
				</tr>
			</table>';
			echo '
			<table>
				<tr>
					<th>Actors</th>
				</tr>';
	}

	$stmt = "SELECT * FROM actor where movie_title = '". $movie ."';";
	foreach($conn->query($stmt) as $row)
	{
		echo '
				<tr>
					<td>'. $row['fname'] .' '. $row['lname'] .'</td>
				</tr>
		';
	}
	echo '</table>';

	$stmt = "SELECT * FROM movie_duration where movie_title = '". $movie ."';";
	echo '<br><table>
			<tr>
				<th>Theatre Name</th>
				<th>Start Date</th>
				<th>End Date</th>
			</tr>';
	foreach($conn->query($stmt) as $row)
	{
		echo '
			<tr>
				<td>'. $row['theatre_name'] .'</td>
				<td>'. $row['start_date'] .'</td>
				<td>'. $row['end_date'] .'</td>
			</tr>
		';
	}
	echo '</table>';


}
catch(PDOException $e) 
{
	echo "Error: " . $e->getMessage();
}
$conn = null;
?>