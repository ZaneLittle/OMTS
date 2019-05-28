<?php

$movieName = $_GET['movieName'];
$home = 'index.php';
//IF theyre logged in, dont log them out
if(isset($_COOKIE['omtsName']))
{
	$home = 'loggedInHome.php';
}

echo '
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
			<a href="'. $home .'"><img src="../resources/images/logo.png" alt="OMTS Logo" height="160" width="160"><h1 class="title">ONLINE MOVIE<br>TICKET SERVICE</h1></a>
			<table class="buttons">';
			if(isset($_COOKIE['omtsName']))
			{		
				echo'
					<tr><td><a href="accountPage.php" class="accountButton">ACCOUNT</a></td></tr>
					<tr><td><a href="#" class="logoutButton" onclick="logout()">LOGOUT</a></td></tr>
				';
			}
			else
			{
				echo '
					<tr><td><a href="registerPage.php" class="registerButton">REGISTER</a></td></tr>
					<tr><td><a href="loginPage.php" class="loginButton">LOGIN</a></td></tr>
				';
			}
echo '
			</table>
		</header>

		<div class="movieSearch">';

// include "movieInfo.php";
if (isset($_COOKIE['omtsEmail']))
{
	echo '
				<form class="header">
					<h1>Showings for '. $movieName .'</h1><br>
				</form>

			<div class="searchBody">
				<div class="forTheScrollBar">
					<div class="searchWindow">
						<table class="searchResults">';

	include "./includes/displayMovieShowings.php";

	echo '
						</table>
					</div>
				</div>
			</div>

			<div class="footer"></div>';
}
echo '
		<div class="movieSearch">
			<form class="header">
				<h1>REVIEWS: '. $movieName .'</h1><br>
			</form>

		<div class="searchBody">
			<div class="forTheScrollBar">
				<div class="searchWindow">
					<table class="searchResults">';

include "./includes/displayReviews.php";

echo '
					</table>
				</div>
			</div>
		</div>

		<div class="footer"></div>

		<div class="movieSearch">
			<form class="header">
				<h1>SUBMIT REVIEW FOR: '. $movieName .'</h1><br>
			</form>

			<div class="searchBody">
				<div class="forTheScrollBar">
					<div class="searchWindow">
						<table>';
							if(isset($_COOKIE['omtsName']))
							{	
								//Only allow reviews to be written if the user is logged in
								echo '
									<input type="text" placeholder="Enter Review Here..." class="reviewText">
									<button class="submitButton" onclick="submitReview(\''. $movieName .'\')">Submit</button>
									';
							}
echo '
						</table>
					</div>
				<div class="footer"></div>
			</div>
		</div>
	</body>
	</html>';

?>