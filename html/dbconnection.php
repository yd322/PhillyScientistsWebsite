<!-- Details of Database Connections -->

<?php
session_start();
 
$dbhost = "localhost"; // this will usually be 'localhost', but can sometimes differ
$dbname = "biokidsusers"; // the name of the database that you are going to use for this project
$dbuser = "biokidsuser"; // the username that you created, or were given, to access your database
$dbpass = "B!0dbconnection"; // the password that you created, or were given, to access your database

$dbconnection = mysqli_connect($dbhost, $dbuser, $dbpass);
$dbselection = mysqli_select_db($dbconnection, $dbname);

?>