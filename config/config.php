<?php


/** Time zone, Important for PHP/MySQL TimeStamp interpretation **/
date_default_timezone_set("Europe/Vienna");

/** URL of the landing page / Controller **/
define ('LANDING_PAGE', '/home');

/** Configuration Variables **/
define ('DEVELOPMENT_ENVIRONMENT', true);

/**
 * default_actions are implemented in controller.class.php.
 * They are executed if a controller is called without an action.
 * Remember to create default_action.php and override the appropriate method for each controller
 */
define ('HANDLE_DEFAULT_ACTIONS', TRUE);

/* Removes HTML tags from $_POST, $_GET and $_COOKIES to prevent code injections */
define('STRIP_HTMLSPECIALCHARS', TRUE);		

define('PDO_DRIVER', 'mysql');			
define('DB_NAME', 'sz');
define('DB_USER', 'sz');
define('DB_PASSWORD', 'password');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
