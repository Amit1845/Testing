<?php
mysqli_report(MYSQLI_REPORT_OFF);

$dbHost = getenv('MYSQL_HOST') ?: getenv('MYSQLHOST') ?: getenv('RAILWAY_TCP_PROXY_DOMAIN') ?: '';
$dbUser = getenv('MYSQL_USER') ?: getenv('MYSQLUSER') ?: '';
$dbPassword = getenv('MYSQL_PASSWORD') ?: getenv('MYSQLPASSWORD') ?: '';
$dbName = getenv('MYSQL_DATABASE') ?: getenv('MYSQLDATABASE') ?: 'bakery_shop_db';
$dbPort = (int) (getenv('MYSQL_PORT') ?: getenv('MYSQLPORT') ?: getenv('RAILWAY_TCP_PROXY_PORT') ?: 3306);

$databaseUrl = getenv('MYSQL_URL') ?: getenv('DATABASE_URL');
if ($databaseUrl) {
	$database = parse_url($databaseUrl);
	if ($database !== false && isset($database['host'])) {
		$dbHost = $database['host'];
		$dbUser = isset($database['user']) ? urldecode($database['user']) : $dbUser;
		$dbPassword = isset($database['pass']) ? urldecode($database['pass']) : $dbPassword;
		$dbName = isset($database['path']) ? ltrim($database['path'], '/') : $dbName;
		$dbPort = isset($database['port']) ? (int) $database['port'] : $dbPort;
	}
}

if ($dbHost === '' || $dbUser === '') {
	header('HTTP/1.1 503 Service Unavailable');
	exit('Database is not configured. Set MYSQL_URL or the MYSQL_HOST, MYSQL_USER, and MYSQL_PASSWORD environment variables.');
}

$con = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName, $dbPort);

if (!$con) {
	header('HTTP/1.1 503 Service Unavailable');
	exit('Database connection is unavailable. Check the Render database environment variables.');
}

mysqli_set_charset($con, 'utf8mb4');
?>