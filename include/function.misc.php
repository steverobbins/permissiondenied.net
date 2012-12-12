<?php

/**
 * Gets the timestamp of when the file was created an appends it to the name
 * 
 * @param string $file Path to file
 * @param boolean $cdn Whether or not the CDN should be used
 * 
 * @return string New path to file
 */
function version($file, $cdn = false) {
    
    if ($cdn) {
    
        $rootfile = ROOT . "cdn/" . $file;
        
        if (!file_exists(SERVER_ROOT . $rootfile))
            return $file;

        //return CDN . $file;
        
        $mtime = filemtime(SERVER_ROOT . $rootfile);
        
        return CDN . preg_replace('{\\.([^./]+)$}', ".$mtime.\$1", $file);
    }
    
    //return $file = ROOT . $file;
    
    if (!file_exists(SERVER_ROOT . $file))
        return $file;
    
    $mtime = filemtime(SERVER_ROOT . $file);
    return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1", $file);
}

/**
 * Set or display error messages/notifications
 * 
 * @param string $message The error message to set
 * @param mixed[] $error Whether or not it's an error
 * 
 * @return string HTML markup for messages
 */
function message($message = false, $error = false) {
    
    if ($error === false && $message === false) {
        
        if (isset($_SESSION['messages'])) {
                
            $return = '';
            
            if (!empty($_SESSION['messages'][0])) $return .= "<ul class=\"messages bad\"><li>" . implode("</li><li>", $_SESSION['messages'][0]) . "</li></ul>";
            if (!empty($_SESSION['messages'][1])) $return .= "<ul class=\"messages good\"><li>" . implode("</li><li>", $_SESSION['messages'][1]) . "</li></ul>";
            if (!empty($_SESSION['messages'][2])) $return .= "<ul class=\"messages none\"><li>" . implode("</li><li>", $_SESSION['messages'][2]) . "</li></ul>";
            
            unset($_SESSION['messages']);
            
            return $return;
        }
        
        return;
    }
    
    return $_SESSION['messages'][is_null($error) ? 2 : $error][] = $message;
}

/**
 * Log traffic to database
 *
 * @return void
 */
function trafficTrack() {
    
    global $db;
    
    $stmt = $db->prepare("INSERT INTO Traffic (AgentId, IpId, PageId, SessionId, Time)
                        VALUES (?, ?, ?, ?, NOW())");
                        
    $stmt->execute(array(
        trafficId("TrafficAgent", $_SERVER["HTTP_USER_AGENT"]),
        trafficId("TrafficIp", $_SERVER["REMOTE_ADDR"]),
        trafficId("TrafficPage", $_SERVER["SCRIPT_URL"]),
        trafficId("TrafficSession", $_COOKIE["PHPSESSID"])
    ));
}

/**
 * Fetches Id from table based on value, if exists
 * If not, create and return ID
 * 
 * @param string $table Table to check against
 * @param string $value Value to check against
 * 
 * @return string Id of item
 */
function trafficId($table, $value) {
    
    global $db;
    $stmt = $db->prepare("SELECT Id
                        FROM $table
                        WHERE Value = ?");
                    
    $stmt->execute(array((string)$value));
    
    if ($stmt->rowCount() < 1) {
        
        $stmt = $db->prepare("INSERT INTO $table (Value)
                        VALUES (?)");
        
        $stmt->execute(array((string)$value));
        
        return $db->lastInsertId();
    }
    else {
        
        $row = $stmt->fetch();        
        return $row['Id'];
    }
}

/**
 * Returns a formatted date and time
 * 
 * @param string $time Timestamp to create date from
 * 
 * @return string New formatted date and time
 */
function datetime($time) {
    
    if (!is_numeric($time) and strlen($time != 10))
        $time = strtotime($time);
    
    return date("Y/m/d", $time) . " at " . date("g:ia", $time);
}

/**
 * Sends HTML emails and logs to database
 *
 * @param string $to
 * @param string $subject
 * @param string $body
 * @param bool $header
 *
 * @return void
 */
function email($to, $subject, $body, $header = false) {
        
    global $db;
    
    if ($header === false) {
        
        $header  = "MIME-Version: 1.0\n";            
        $header .= "Content-type: text/html; charset=iso-8859-1\n";
        $header .= "From: " . SITE_NAME . " <no-reply@" . NICE_URL . ">\n";
    }
    
    $stmt = $db->prepare("INSERT INTO EmailLog
                        (TrafficId, To, Subject, Body, Header, Time)
                        VALUES (?, ?, ?, ?, ?, NOW())");
                        
    $stmt->execute(array($_SESSION['traffic'], $to, $subject, $body, $header));
    
    mail($to, $subject, $body, $header);
}

/**
 * Check that post value is not empty
 * 
 * @param string $name Name attribute of input
 * @param string $message Error message to display
 * @param boolean $errors
 * 
 * @return boolean
 */
function checkRequired($name, $message, $errors) {
    
    if (!isset($_POST[$name])) {
        
        message($message);        
        return true;
    }
    
    if (empty($_POST[$name])) {
        
        message($message);        
        return true;
    }
    
    if (trim($_POST[$name]) == "") {
        
        message($message);        
        return true;
    }
    
    return $errors;
}

/**
 * Check that post value is a valid email
 * 
 * @param string $name Name of attribute of input
 * @param string $message Error message to display
 * @param boolean $errors
 * 
 * @return boolean
 */
function checkEmail($name, $message, $errors) {
    
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $_POST[$name])) {
        
        message($message);        
        return true;
    }
    
    return $errors;
}

function notPublic() {
    
    if ($_SERVER["SCRIPT_NAME"] == $_SERVER["PHP_SELF"]) die(header("HTTP/1.1 403 Forbidden"));
}

function charLimit($string, $limit = 50) {

    $overflow = (strlen(strip_tags($string)) > $limit ? true : false);

    return substr(strip_tags($string), 0, $limit) . ($overflow === true ? "..." : '');
}