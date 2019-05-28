<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "OMTSDB";

try 
{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	//Set PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$theatre = "'" . $_POST["theatresContent"] . "'";
	$searchStr = "'%" . $_POST["searchInput"] . "%'";

	// construct query 
	$stmt = "SELECT DISTINCT movie.movie_title, movie.director_fname, 
				movie.director_lname, 
				movie.rating, movie.running_time
			FROM movie
			NATURAL JOIN actor
			NATURAL JOIN showings
			WHERE ";
	if ($_POST["theatresContent"] != "All")
	{
		$stmt .= "showings.theatre_name LIKE $theatre, ";
	}
	if ($_POST["filtersContent"] == "Title")
	{
		$stmt .= "movie.movie_title LIKE $searchStr";
	}
	else if ($_POST["filtersContent"] == "Director") 
	{
		$stmt .= "CONCAT(movie.director_fname, ' ', movie.director_lname) 
			LIKE $searchStr";
	}
	else if ($_POST["filtersContent"] == "Actors")
	{
		$stmt .= "CONCAT(actor.fname, ' ', actor.lname) LIKE $searchStr";
	}
	else if ($_POST["filtersContent"] == "Rating")
	{
		$stmt .= "movie.rating LIKE $searchStr";
	}
	else if ($_POST["filtersContent"] == "All")
	{
		$stmt .= "(movie.movie_title LIKE $searchStr or 
			CONCAT(movie.director_fname, ' ', movie.director_lname) LIKE $searchStr 
			or CONCAT(actor.fname, ' ', actor.lname) LIKE $searchStr 
			or movie.rating LIKE $searchStr)";
	}	
	else {
		throw new PDOException("Theatre dropdown did not match options.");
	}
	
	//echo $stmt; // debug

	// create table headers
	echo '<tr>
			<th style="width: 31%;">Title</th>
			<th style="width: 12%;">Director</th>
			<th style="width: 31%;">Actors</th>
			<th style="width: 8%;">Rating</th>
			<th style="width: 8%;">Duration</th>
		</tr>';

	$actorQuer = "";
	//execute and display results

	//Counter to check if there are no results
	$count = 0;
	foreach($conn->query($stmt) as $row)
	{
		$count++;
		echo "<tr class='clickable-row' onclick='displayReview(this)'>
		<td class='movieName'>".$row[0]."</td> 
		<td>".$row[1]." ".$row[2]."</td>";

		//Query actors for this movie
		$title = "'" . $row[0] . "'";
		$actors = $conn->query("SELECT DISTINCT fname, lname
								FROM actor
								WHERE movie_title = $title");
		$count = 0;
		echo "<td>";
		foreach($actors as $actor)
		{
			$count++;
			echo $actor[0] . " " . $actor[1] . "<br>";
		}
		echo "</td>"; 

		echo "<td>".$row[3]."</td> 
		<td>".$row[4]."</td> 
		</tr>";
	}

	//If there were no rows
	if($count <= 0){ 
		echo '<tr colspan="5"><td><p class="emptySearch">No Results Found</p></td></tr>';
	}
}
catch(PDOException $e) 
{
	echo "Error retrieving search: " . $e->getMessage();
}
$conn = null;
?>