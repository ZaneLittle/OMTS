<?php

if(isset($_COOKIE['omtsName']))
{
	include './loggedInHome.php';
}
else
{
	include './loggedOutHome.php';
}