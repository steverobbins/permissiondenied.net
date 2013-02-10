<?php

/**
 * Turn on error reporting. I'm not afraid.
 */
ini_set("display_errors", 1);

/**
 * Several useful URL related resource used globally.
 */
define("ABS_BASE", "/");
define("WEB_ROOT", "http://permissiondenied.net" . BASE);
define("NICE_URL", "PermissionDenied.net");
define("SERVER_ROOT", "/path/to/permissiondenied.net/");
define("CDN", "http://pd-cdn.net/");

/**
 * Contact information and other display info.
 */
define("SITE_NAME", "Permission Denied");
define("SITE_EMAIL", "email@example.com");

/**
 * Used to calculate page render time in footer.
 * see include/global/footer.php
 */
define("REQUEST_TIME_START", microtime());

/**
 * Capture the current URL.
 * Used for addthis sharing
 */
$url = $_SERVER["SCRIPT_URL"];
if (substr($url[0], 0, 1) == "/") substr($url, 1);
define("CURRENT_URL", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

/**
 * MySQL connection info.
 */
define("SQL_TYPE", "mysql");
define("SQL_HOST", "localhost");
define("SQL_DATABASE", "");
define("SQL_USER", "");
define("SQL_PASSWORD", "");

/**
 * Code sample pages.
 * see include/global/side.php and include/code-samples/list.php
 */
$codesamples = array(
    'php-class-to-help-create-xml' => array('xmldoc.php', 'PHP Class to Help Create XML'),
    'get-data-from-unknown-mysql-database' => array( 'unknowndb.php', 'Get All Data from Unknown Structure of MySQL Database'),
    'show-all-images-in-directory' => array( 'allimages.php', 'Recursively Loop Through Directory and Show All Images')
);

/**
 *
 * Known http error codes.
 * see error.php
 */
$httpcodes = array(
    403 => "Forbidden<br />You are not allowed to do that.",
    404 => "Sorry, we couldn't find what you're looking for."
);

/**
 * Allowed tables for /traffic
 *
 * see include/function.traffic.php
 */
$allowedtables = array(
    "Traffic",
    "TrafficAgent",
    "TrafficPage"
);

define("MAX_USER_QUERY_LIMIT", 30);