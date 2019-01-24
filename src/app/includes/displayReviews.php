<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "OMTSDB";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$movie = $_GET["movieName"];
	
	//Select the reviews for the movie
	$query = 'SELECT fname, lname, review_contents, time_posted FROM review as R, customer as C WHERE R.account_id = C.account_id AND R.movie_title = "'. $movie .'" ORDER BY time_posted desc;';

	//Start the options with all
	echo '		
		<tr>
			<th style="width: 31%;">Reviewer</th>
			<th style="width: 69%;">Review</th>
		</tr>
		';

	$count = 0;
	//Loop through the theatres and create an option for each one
	foreach($conn->query($query) as $row)
	{
		$count++;
		echo '				
			<tr id="'. $row[3] .'">
				<td>'. $row[0] . ' ' . $row[1] .'</td>
				<td>'. $row[2] .'</td>
			</tr>
			';
	}

	if($count == 0){
		echo '				
			<tr>
				<td colspan="2">No Results</td>
			</tr>
			';
	}
}
catch(PDOException $e) 
{
	echo "Error retrieving search: " . $e->getMessage();
}
$conn = null;

?>