<?php

if(isset($_COOKIE['omtsName']))
{
	include './src/app/loggedInHome.php';
}
else
{
	include './src/app/loggedOutHome.php';
}