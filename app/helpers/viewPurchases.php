<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "OMTSDB";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$email = $_COOKIE['omtsEmail'];


	//Choose the reservations for the user
	$query = 'SELECT movie_title, theatre_name, theatre_num, start_time, showing_date, ticket_num FROM reservation as R, customer as C WHERE R.account_id = C.account_id and C.email_address = "'. $email .'" and (R.showing_date > NOW() or (R.showing_date = CURDATE() and R.start_time > NOW())) order by showing_date asc, start_time asc;';


	$count = 0;

	echo '<table>';
	//Loop through the results
	foreach($conn->query($query) as $row)
	{
		$count++;
		echo '				
			<tr>
				<td>
					<form method="post" action="cancelReservation.php">
						<table>
							<tr>
								<th>Movie Title</th>
								<th>Theatre Name</th>
								<th>Theatre Number</th>
								<th>Start Time</th>
								<th>Showing Date</th>
								<th># of Tickets</th>
							</tr>
							<tr>
								</td>
								<td class="movie_title">'. $row['movie_title'] . '</td>
								<td class="theatre_name">'. $row['theatre_name'] .'</td>
								<td class="theatre_num">'. $row['theatre_num'] .'</td>
								<td class="start_time">'. $row['start_time'] .'</td>
								<td class="showing_date">'. $row['showing_date'] .'</td>
								<td class="ticket_num">'. $row['ticket_num'] .'</td>
								<td style="display:none;">
									<input name="movie_title" value="'. $row['movie_title'] . '"/>
									<input name="theatre_name" value="'. $row['theatre_name'] .'"/>
									<input name="theatre_num" value="'. $row['theatre_num'] .'"/>
									<input name="start_time" value="'. $row['start_time'] .'"/>
									<input name="showing_date" value="'. $row['showing_date'] .'"/>
									<input name="ticket_num" value="'. $row['ticket_num'] .'"/>
								</td>
								<td><button class="cancel" name="cancelReservation" type="submit">Cancel</button></td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
			';
	}
	echo '</table><br><br><table>';

	$query = 'SELECT movie_title, theatre_name, theatre_num, start_time, showing_date, ticket_num FROM reservation as R, customer as C WHERE R.account_id = C.account_id and C.email_address = "'. $email .'" and (R.showing_date < NOW() or (R.showing_date = CURDATE() and R.start_time <= NOW())) order by showing_date desc, start_time desc;';

	echo '
		<tr>
			<th>Movie Title</th>
			<th>Theatre Name</th>
			<th>Theatre Number</th>
			<th>Start Time</th>
			<th>Showing Date</th>
			<th># of Tickets</th>
		</tr>';

	foreach($conn->query($query) as $row)
	{
		$count++;
		echo '				
			<tr>
				</td>
				<td class="movie_title">'. $row['movie_title'] . '</td>
				<td class="theatre_name">'. $row['theatre_name'] .'</td>
				<td class="theatre_num">'. $row['theatre_num'] .'</td>
				<td class="start_time">'. $row['start_time'] .'</td>
				<td class="showing_date">'. $row['showing_date'] .'</td>
				<td class="ticket_num">'. $row['ticket_num'] .'</td>
			</tr>';
	}

	echo '</table>';



	if($count == 0){
		echo '				
			<tr>
				<td colspan="6">No Results</td>
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