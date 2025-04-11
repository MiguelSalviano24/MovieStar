<?php
$host = 'localhost';
$user = 'root';
$passwd = '';
$db = 'moviestar';

$conn = new PDO("mysql:host=$host; dbname=$db", $user, $passwd);

// Erros PDO
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
