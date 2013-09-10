<?php 

// Include DAL, Ajouter de toutes les class se delare ci-dessous
require_once(dirname(__FILE__) . '/inc/DAL.class.php');

// Database
define ( 'DB_HOST', 'localhost' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASSWORD', '' );
define ( 'DB_DB', 'agence' );

//Define paths

defined("STYLE_PATH")
	or define("IMAGES_PATH", realpath(dirname(__FILE__) . '/style'));
	
defined("INC_PATH")
	or define("INC_PATH", realpath(dirname(__FILE__) . '/inc'));

//Error reporting

ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

?>