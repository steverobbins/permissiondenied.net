<?php

session_start();

include 'config.php';

/**
 * Dynamically allocate base path
 */
$uri = reset(explode("?", preg_replace('/^' . preg_quote(ABS_BASE, '/') . '/', '', $_SERVER['REQUEST_URI'])));
define("BASE", str_repeat("../", substr_count($uri, "/")));

include 'class.pdoex.php';
include 'function.misc.php';

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
    print "SQL Error: " . $e->getMessage() . "<br/>";
    die();
}

/**
 * Analytics
 */
$stmt = $db->prepare("INSERT INTO Traffic (AgentId, IpId, PageId, SessionId, Time)
                    VALUES (?, ?, ?, ?, NOW())");
$stmt->execute(array(
    trafficId("TrafficAgent", $_SERVER["HTTP_USER_AGENT"]),
    trafficId("TrafficIp", $_SERVER["REMOTE_ADDR"]),
    trafficId("TrafficPage", $_SERVER["SCRIPT_URL"]),
    trafficId("TrafficSession", $_COOKIE["PHPSESSID"])
));
$_SESSION['traffic'] = $db->lastInsertId();