<!DOCTYPE html>
<html lang="en">

<head>
	<title>OMTS</title>
	<link rel="icon" href="./resources/images/ourlogo.png">

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="./resources/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Faster+One|Roboto+Condensed" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Faster+One|Monoton|Roboto+Condensed" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="./resources/js/func.js"></script>
</head>

<body class='body'>
	<header class="mainHeader">
		<a href="index.html"><img src="./resources/images/ourlogo.png" alt="OMTS Logo" height="160" width="160"><h1 class="title">ONLINE MOVIE<br>TICKET SERVICE</h1></a>
		<table class="buttons">		
			<tr><td><a href="accountPage.php" class="accountButton">ACCOUNT</a></td></tr>
			<tr><td><a href="index.html" class="logoutButton">LOGOUT</a></td></tr>
		</table>
	</header>

<div class="movieSearch">
	<form class="header">
		<h1>REVIEWS: WHEN HARRY MET SALLY</h1><br>
	</form>

<div class="searchBody">
	<div class="forTheScrollBar">
		<div class="searchWindow">
			<table class="searchResults">
				<?php
					include './includes/displayReview.php';
				?>
			</table>
		</div>
	</div>
</div>

<div class="footer"></div>

<div class="movieSearch">
	<form class="header">
		<h1>SUBMIT REVIEW FOR: HARRY MET SALLY</h1><br>
	</form>

	<div class="searchBody">
		<div class="forTheScrollBar">
			<div class="searchWindow">
				<table class="searchResults">
					<input type="text" placeholder="Enter Review Here...">
					<button class="submitButton">Submit</button>
				</table>
			</div>
		<div class="footer"></div>
	</div>
</div>
</div>

</body>
</html>








