<?php 

$db = 'test';
$host = 'localhost';
$user = 'root';
$pass = '';

$pdo = new PDO("mysql:dbname=$db;host=$host", $user,$pass);
