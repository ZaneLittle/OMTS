<?php
$host = "us-cdbr-iron-east-02.cleardb.net";
$username = "b5e88e9076fea0";
$password = "b3cc4ff5";
$dbname = "heroku_ae61fbadec5f8bf";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//Select the theatres
	if($_GET['orderBy'] == 'name')
	{
		$query = 'SELECT * FROM theatre_complex';
	}
	else if($_GET['orderBy'] == 'popularity')
	{
		$query = 'SELECT city, country, phone_num, postal_code, street_name, street_num, T.theatre_name FROM theatre_complex as T, (SELECT theatre_name, SUM(ticket_num) as s from reservation GROUP BY theatre_name) as R WHERE T.theatre_name = R.theatre_name ORDER BY s DESC;';
	}

	echo '		
		<tr>
			<th>Theatre Name</th>
			<th>Phone</th>
			<th colspan="5">Address</th>
		</tr>
		';


	$count = 0;
	//Loop through the results
	foreach($conn->query($query) as $row)
	{
		$count++;
		echo '				
			<tr class="clickable-row" onclick="editTheatre(this)">
				<td class="theatre_name">'. $row['theatre_name'] . '</td>
				<td class="phone_num">'. $row['phone_num'] .'</td>
				<td class="street_num">'. $row['street_num'] .'</td>
				<td class="street_name">'. $row['street_name'] .'</td>
				<td class="postal_code">'. $row['postal_code'] .'</td>
				<td class="country">'. $row['country'] .'</td>
				<td class="city">'. $row['city'] .'</td>
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