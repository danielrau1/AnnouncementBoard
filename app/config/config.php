<?php

//(B4)App root
//echo __FILE__; // shows the location of the file
//echo dirname(__FILE__); //shows the path up to the parent
define('APPROOT',dirname(dirname(__FILE__))); // define constant up to the app root, and can access from any file

// (B4.1) url root
define('URLROOT','http://localhost/AnnouncementBoard');

//(B4.2) site name
define('SITENAME','AnnouncementBoard');

//(B6) DB Params
define('DB_HOST','localhost:81'); // Make sure you type the right local host !!!
define ('DB_USER','root');
define ('DB_PASS','');
define('DB_NAME','AnnouncementBoardphp'); // create this db in phpmyadmin
