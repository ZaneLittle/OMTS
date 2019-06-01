<?php
$message="Disclaimer: this website is is a work in progress and is not fully functional.";
echo "<script type='text/javascript'>alert('$message');</script>";

if(isset($_COOKIE['omtsName']))
{
	include './loggedInHome.php';
}
else
{
	include './loggedOutHome.php';
}