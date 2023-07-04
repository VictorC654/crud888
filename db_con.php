<?php

$servername = "localhost";
$username = "root";
$password = "1111";
$dbname = "crud";

$conn = new mysqli($servername,$username,$password,$dbname);

if(!$conn)
{
    die("Database isnt connected;");
}





