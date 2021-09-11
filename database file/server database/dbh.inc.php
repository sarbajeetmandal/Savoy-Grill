<?php

$servername = "sql202.epizy.com";
$dBUsername = "epiz_29213895";
$dBPassword = "xqRu6vhuOm";
$dBName = "epiz_29213895_loginsystem";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn){
    die("Connection failed:" .mysqli_connect_error());
}
?>

