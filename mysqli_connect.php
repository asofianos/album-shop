<?php

$DB_HOST='localhost';
$DB_NAME='your_db_name';
$DB_PASSWORD='your_password';
$DB_USER='your_db_user';

$con = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
if (!$con) { 
		die('Could not connect: ' . mysql_error()); 
}

?>