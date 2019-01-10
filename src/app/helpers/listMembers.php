<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "OMTSDB";

try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	//Select the reviews for the movie
	$query = 'SELECT * FROM customer';

	//Start the options with all
	echo '		
		<tr>
			<th colspan="2">Name</th>
			<th>Acct ID</th>
			<th>Password</th>
			<th colspan="5">Address</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Credit #</th>
			<th>Credit Expiry</th>
		</tr>
		';


	$count = 0;
	//Loop through the theatres and create an option for each one
	foreach($conn->query($query) as $row)
	{
		$count++;
		echo '				
			<tr class="clickable-row" onclick="editMember(this)">
				<td class="fname">'. $row['fname'] . '</td>
				<td class="lname">'. $row['lname'] .'</td>
				<td class="account_id">'. $row['account_id'] .'</td>
				<td class="password">'. $row['password'] .'</td>
				<td class="street_num">'. $row['street_num'] .'</td>
				<td class="street_name">'. $row['street_name'] .'</td>
				<td class="postal_code">'. $row['postal_code'] .'</td>
				<td class="country">'. $row['country'] .'</td>
				<td class="city">'. $row['city'] .'</td>
				<td class="phone_num">'. $row['phone_num'] .'</td>
				<td class="email_address">'. $row['email_address'] .'</td>
				<td class="credit_num">'. $row['credit_num'] .'</td>
				<td class="credit_expiry">'. $row['credit_expiry'] .'</td>
			</tr>
			';
	}

	if($count == 0){
		echo '				
			<tr>
				<td colspan="13">No Results</td>
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