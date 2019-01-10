<?php

echo count($_COOKIE);

//Deleting the cookies
setcookie("omtsEmail", '', time() - 3600, '/');
setcookie("omtsPass", '', time() - 3600, '/');
setcookie("omtsName", '', time() - 3600, '/');
setcookie("omtsAdmin", '', time() - 3600, '/');

echo count($_COOKIE);

?>