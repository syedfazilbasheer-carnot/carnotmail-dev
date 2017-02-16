<?php
	//----------------------------------------------------------------------------------//
	//                               COMPULSORY SETTINGS
	//----------------------------------------------------------------------------------//

	/*  Set the URL to your Sendy installation (without the trailing slash) */
	define('APP_PATH', 'https://carnotmail.herokuapp.com');

	//Carnotmail old-dev
	// mysql://b193cc46d0bff6:bb558cd8@us-cdbr-iron-east-04.cleardb.net/heroku_6bcee32fd857856?reconnect=true

	/*  MySQL database connection credentials (please place values between the apostrophes) */
	$dbHost = 'us-cdbr-iron-east-04.cleardb.net'; //MySQL Hostname
	$dbUser = 'b193cc46d0bff6'; //MySQL Username
	$dbPass = 'bb558cd8'; //MySQL Password
	$dbName = 'heroku_6bcee32fd857856'; //MySQL Database Name


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
