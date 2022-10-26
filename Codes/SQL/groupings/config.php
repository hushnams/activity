<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'tb_user';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

if (!$conn){
    echo "Connection Failed";
}

?>