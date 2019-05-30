<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$movie = $_GET["movieName"];
	
	//Select the reviews for the movie
	$stmt = 'SELECT * FROM showings WHERE movie_title = "' . $movie . '" ORDER BY start_time desc;';
	//echo $stmt;
	//Start the options with all
	echo '		
		<tr>
			<th style="width: 20%;">Complex</th>
			<th style="width: 20%;">Theatre Number</th>
			<th style="width: 20%;">Seats Available</th>
			<th style="width: 15%;">Start Time</th>
			<th style="width: 25%;">Book This Showing</th>
		</tr>';

	$count = 0;
	//Loop through the theatres and create an option for each one
	foreach($conn->query($stmt) as $row)
	{
		$count++;
		echo '				
			<tr calss="showing">
				<td class="theatre_name">'. $row['theatre_name'] . '</td>
				<td class="theatre_num">'. $row['theatre_num'] . '</td>
				<td class="seats_available">'. $row['seats_available'] . '</td>
				<td class="start_time">'. $row['start_time'] . '</td>
				<td class="showing_date_row">
					<form action="./bookShowing.php" method="post"> 
					<input type="text" name="showing_date" class="showing_date" placeholder="YYYY-MM-DD" maxlength="10" size="10"/>
					<input type="text" name="tickets2book" class="tickets2book" placeholder="#" maxlength="3" size="3"/>
					<input style="display:none;" name="movie_title" value="' . $movie . '"/>
					<input style="display:none;" name="theatre_name" value="' . $row['theatre_name'] .'"/>
					<input style="display:none;" name="theatre_num" value="' . $row['theatre_num'] .'"/>
					<input style="display:none;" class="seats_available" name="seats_available" value="' . $row['seats_available'] . '"/>
					<input style="display:none;" name="start_time" value="' . $row['start_time'] . '"/>
					<button class="submitButton" onclick="return validateBooking(this)">Book</button></form>
				</td>
			</tr>';
	}

	if($count == 0){
		echo '				
			<tr>
				<td colspan="2">No Results</td>
			</tr>';
	}
}
catch(PDOException $e) 
{
	echo "Error retrieving search: " . $e->getMessage();
}
$conn = null;

?>