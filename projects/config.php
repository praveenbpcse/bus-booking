<?php
$db_user = "root";
$db_pass = "";
$db_name = "projectdata";

$link = mysqli_connect("localhost", $db_user, $db_pass, $db_name);
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}