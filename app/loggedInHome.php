<?php

if(isset($_COOKIE['omtsName']))
{
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
		<body class="body" onload="displayMovies()">
			<header class="mainHeader">
				<a href="loggedInHome.php"><img src="../resources/images/logo.png" alt="OMTS Logo" height="160" width="160"><h1 class="title">ONLINE MOVIE<br>TICKET SERVICE</h1></a>
				<table class="buttons">		
					<tr><td><a href="accountPage.php" class="accountButton">ACCOUNT</a></td></tr>
					<tr><td><a href="#" class="logoutButton" onclick="logout()">LOGOUT</a></td></tr>
				</table>
			</header>';

	include "./includes/movieForm.php";

	echo '
		</body>';

}
else
{
	echo 'Please log in first';
}