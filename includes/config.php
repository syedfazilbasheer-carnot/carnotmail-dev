<?php
	//----------------------------------------------------------------------------------//
	//                               COMPULSORY SETTINGS
	//----------------------------------------------------------------------------------//

	/*  Set the URL to your Sendy installation (without the trailing slash) */
	define('APP_PATH', 'https://carnotmail-dev.herokuapp.com');
	// mysql://b9809b7f27ca86:6aedbe38@us-cdbr-iron-east-04.cleardb.net/heroku_d9311a2a20ecb21?reconnect=true ##Original
	// mysql://b4d3d6bb9d14db:dde25aff@us-cdbr-iron-east-04.cleardb.net/heroku_1dd5cb244637831?reconnect=true ##Dev

	/*  MySQL database connection credentials (please place values between the apostrophes) */
	$dbHost = 'us-cdbr-iron-east-04.cleardb.net'; //MySQL Hostname
	$dbUser = 'b4d3d6bb9d14db'; //MySQL Username
	$dbPass = 'dde25aff'; //MySQL Password
	$dbName = 'heroku_1dd5cb244637831'; //MySQL Database Name


	//----------------------------------------------------------------------------------//
	//								  OPTIONAL SETTINGS
	//----------------------------------------------------------------------------------//

	/*
		Change the database character set to something that supports the language you'll
		be using. Example, set this to utf16 if you use Chinese or Vietnamese characters
	*/
	$charset = 'utf8';

	/*  Set this if you use a non standard MySQL port.  */
	$dbPort = 3306;

	/*  Domain of cookie (99.99% chance you don't need to edit this at all)  */
	define('COOKIE_DOMAIN', '');

	//----------------------------------------------------------------------------------//
?>
