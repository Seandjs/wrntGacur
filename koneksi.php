<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "wrntgacur";

return new PDO("mysql:host=$host; dbname=$db", $user, $pass);