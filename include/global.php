<?php

session_start();

include 'config.php';

/**
 * Used to calculate page render time in footer.
 * see include/global/footer.php
 */
define("REQUEST_TIME_START", microtime());

/**
 * Capture the current URL.
 * Used for addthis sharing
 */
$url = @$_SERVER["SCRIPT_URL"];
if (substr($url[0], 0, 1) == "/") substr($url, 1);
define("CURRENT_URL", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

/**
 * Dynamically allocate base path
 */
$uri = explode("?", preg_replace('/^' . preg_quote(ABS_BASE, '/') . '/', '', $_SERVER['REQUEST_URI']));
$uri = reset($uri);
define("BASE", str_repeat("../", substr_count($uri, "/")));

include 'class.pdoex.php';
include 'function.global.php';

/**
 * Set encoding
 * Needed as we're not using .php/.html in our url
 */
if (substr($_SERVER['SCRIPT_NAME'], -4) == ".php") header('Content-type: text/html; charset=utf-8');

/**
 * Initialize mysql connection
 */
try {
    $db = new PDOEx(SQL_TYPE . ':host=' . SQL_HOST . ';dbname=' . SQL_DATABASE, SQL_USER, SQL_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    echo "SQL Error: " . $e->getMessage() . "<br/>";
    exit;
}

/**
 * Analytics
 */
$stmt = $db->prepare("INSERT INTO Traffic (AgentId, IpId, PageId, SessionId, Time)
                    VALUES (?, ?, ?, ?, NOW())");
$stmt->execute(array(
    trafficId("TrafficAgent", $_SERVER["HTTP_USER_AGENT"]),
    trafficId("TrafficIp", $_SERVER["REMOTE_ADDR"]),
    trafficId("TrafficPage", $_SERVER["SCRIPT_NAME"]),
    trafficId("TrafficSession", $_COOKIE["PHPSESSID"])
));
$_SESSION['traffic'] = $db->lastInsertId();
