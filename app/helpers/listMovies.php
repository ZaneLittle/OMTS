<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//Select the movies
	if($_GET['orderBy'] == 'name')
	{
		$query = 'SELECT * FROM movie';
	}
	else if($_GET['orderBy'] == 'popularity')
	{
		$query = 'SELECT director_fname, director_lname, M.movie_title, plot, prod_company, rating, running_time FROM movie as M, (SELECT movie_title, SUM(ticket_num) as s from reservation GROUP BY movie_title) as R WHERE M.movie_title = R.movie_title ORDER BY s DESC;';
	}

	echo '		
		<tr>
			<th>Movie</th>
			<th>Rating</th>
			<th>Plot</th>
			<th colspan="2">Director</th>
			<th>Production Company</th>
			<th>Running Time</th>
		</tr>
		';


	$count = 0;
	//Loop through the results
	foreach($conn->query($query) as $row)
	{
		$count++;
		echo '				
			<tr class="clickable-row" onclick="editMovie(this)">
				<td class="movie_title">'. $row['movie_title'] . '</td>
				<td class="rating">'. $row['rating'] .'</td>
				<td class="plot">'. $row['plot'] .'</td>
				<td class="director_fname">'. $row['director_fname'] .'</td>
				<td class="director_lname">'. $row['director_lname'] .'</td>
				<td class="prod_company">'. $row['prod_company'] .'</td>
				<td class="running_time">'. $row['running_time'] .'</td>
			</tr>
			';
	}

	if($count == 0){
		echo '				
			<tr>
				<td colspan="7">No Results</td>
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