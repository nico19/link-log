<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database

	'connectionString' => 'mysql:host=db4free.net;dbname=nico_security',
	'emulatePrepare' => true,
	'username' => 'nico_security',
	'password' => 'nico_security',
	'charset' => 'utf8',

);