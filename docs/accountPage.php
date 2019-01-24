<?php

$name = 'USER';

//If there is a cookie
if(isset($_COOKIE['omtsName']))
{
	$name = $_COOKIE['omtsName'];

echo '
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<title>OMTS</title>
			<link rel="icon" href="./resources/images/logo.png">

			<meta charset="utf-8">

			<meta name="viewport" content="width=device-width, initial-scale=1.0">

			<link rel="stylesheet" href="./resources/css/style.css">
			<link href="https://fonts.googleapis.com/css?family=Faster+One|Roboto+Condensed" rel="stylesheet">

			<link href="https://fonts.googleapis.com/css?family=Faster+One|Monoton|Roboto+Condensed" rel="stylesheet">

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="./resources/js/func.js"></script>
		</head>
		<body class="body">
			<header class="mainHeader">
				<h1 class="title"><a href="loggedInHome.php">ONLINE MOVIE<br>TICKET SERVICE</a></h1>
				<table class="buttons">		
					<tr><td><a href="accountPage.php" class="accountButton">ACCOUNT</a></td></tr>
					<tr><td><a class="logoutButton" onclick="logout()">LOGOUT</a></td></tr>
				</table>
			</header>

			<div class="settingPageContent">
				<div class="sideBar">
					<div class="userButtons">
						<button class="updateProfile" onClick="document.location.href=\'updateProfile.php\'">Update Profile</button>
						<button class="viewPurchases" onclick="accountOptions(this)">View Purchases</button>';

if(isset($_COOKIE['omtsAdmin']))
{
	if($_COOKIE['omtsAdmin'] == "T")
	{
		echo '
			<button class="listMembers" onclick="accountOptions(this)">List Members</button>
			<button class="listTheatres" onclick="accountOptions(this)">List Theatres</button>
			<button class="listMovies" onclick="accountOptions(this)">List Movies</button>
			<button class="popMovies" onclick="accountOptions(this)">Most Popular Movies</button>
			<button class="popTheatres" onclick="accountOptions(this)">Most Popular Theatres</button>
		';
	}
}

echo '
					</div>
				</div>
				<div class="settingsContent">
					<p>WELCOME '. $name .'</p>
				</div>
			</div>
		</body>	';
}
else
{
	echo 'Please Log in on the home page';
}