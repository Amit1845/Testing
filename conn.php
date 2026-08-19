<?php
$dbHost = getenv('MYSQL_HOST') ?: 'localhost';
$dbUser = getenv('MYSQL_USER') ?: 'root';
$dbPassword = getenv('MYSQL_PASSWORD') ?: '';
$dbName = getenv('MYSQL_DATABASE') ?: 'bakery_shop_db';
$dbPort = (int) (getenv('MYSQL_PORT') ?: 3306);

$con = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName, $dbPort);

if (!$con) {
	header('HTTP/1.1 503 Service Unavailable');
	exit('Database connection is unavailable. Check the Render database environment variables.');
}

mysqli_set_charset($con, 'utf8mb4');
?>