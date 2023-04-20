<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'wellvax';
// Create DSN
$dsn = "mysql:host=$dbhost;dbname=$dbname";
try{
    $pdo = new PDO($dsn, $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die('Failed to connect to database'.$e->getMessage());
}

 ?>
