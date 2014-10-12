<?php

$url = parse_url(getenv("DATABASE_URL"));

$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);



return array(

	'default' => 'pgsql',
	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	|
	| Here are each of the database connections setup for your application.
	| Of course, examples of configuring each database platform that is
	| supported by Laravel is shown below to make development simple.
	|
	|
	| All database work in Laravel is done through the PHP PDO facilities
	| so make sure you have the driver for your particular database of
	| choice installed on your machine before you begin development.
	|
	*/

	'connections' => array(
		
		'pgsql' => array(
			'driver'   => 'pgsql',
			'host'     => $host,
			'database' => $database,
			'username' => $username,
			'password' => $password,
			'charset'  => 'utf8',
			'prefix'   => '',
			'schema'   => 'public',
		),
		

	),

);
