<?php

$server = "localhost";
$user = "root";
$pin = "";
$database = "pixeldrop";

$conn = mysqli_connect($server,$user,$pin,$database);

if(!$conn){
    echo "Connection Failed"; 
    exit();
}



?>