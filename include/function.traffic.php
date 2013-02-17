<?php

/**
 * Helper to organize and increment browser array
 *
 * @param array $browsers
 * @param string $agent
 * @param int $count
 *
 * @return array
 */
function browserGroup(array $browsers, $agent, $count) {
    
    if ($b = browser($agent)) $browsers[$b] += $count;
    
    return $browsers;
}

/**
 * Determines "readable" browser string
 *
 * @param string $agent
 *
 * @return string
 */
function browser($agent) {
    
    //if (preg_match("/bot|spider|w3c|validat|crawl|monitor|php/i", $agent) || empty($agent)) return "Bot/Spider";
    if (preg_match("/Konqueror/", $agent)) return "Konqueror";
    if (preg_match("/SeaMonkey/", $agent)) return "SeaMonkey";
    if (preg_match("/Dillo/", $agent)) return "Dillo";
    if (preg_match("/SonyEricsson/", $agent)) return "SonyEricsson";
    if (preg_match("/MSIE/", $agent)) return "Internet Explorer";
    if (preg_match("/iPad/", $agent)) return "iPad";
    if (preg_match("/iPhone/", $agent)) return "iPhone";
    if (preg_match("/Android/", $agent)) return "Android";
    if (preg_match("/Opera/", $agent)) return "Opera";
    if (preg_match("/Chrome/", $agent)) return "Google Chrome";
    if (preg_match("/Firefox/", $agent)) return "Mozilla Firefox";
    if (preg_match("/Safari/", $agent)) return "Safari";
    return "Bot/Spider";
    //return $agent;
}

/**
 * Helper to organize and increment city array
 *
 * @param array $cities
 * @param string $ip
 * @param int $count
 *
 * @return array
 */
function cityGroup($cities, $ip, $count) {
    
    $region = regionFromIp($ip);
    
    if (!empty($region)) $cities[$region] += $count;
    
    return $cities;
}

/**
 * Return a region string from supplied IP
 *
 * @param string $ip
 *
 * @return string
 */
function regionFromIp($ip) {
                            
    $gi = geoip_open(SERVER_ROOT . "include/GeoIP/geoip.dat", GEOIP_STANDARD);
            
    $geoip = geoip_record_by_addr($gi, $ip);
    
    $loc = htmlentities((!empty($geoip->city) ? $geoip->city . ", " : "") .
           (!empty($geoip->region) && $geoip->country_name == "United States" ? $geoip->region . ", " : "") .
           $geoip->country_name);
    
    geoip_close($gi);
    
    return $loc;
}

/**
 * Run the user query with the read only user
 *
 * @param string $string
 *
 * @return string
 */
function userQuery($string) {

    try {
        
        $dbr = new PDO(SQL_TYPE . ':host=' . SQL_HOST . ';dbname=' . SQL_DATABASE, 'deniedreadonly', 'Re4d0nlyaccess');
        
        $stmt = $dbr->query($string);
        
        if (!$stmt) return $dbr->errorInfo();        
        if ($stmt->rowCount() < 1) return "No results returned";
        
        $return = array();
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            $return[] = $row;
        }
        
        return $return;        
    }
    catch (PDOException $e) {
        
        // Catch Expcetions from the above code for our Exception Handling
        $trace = '<table border="0">';
        foreach ($err->getTrace() as $a => $b) {
            foreach ($b as $c => $d) {
                if ($c == 'args') {
                    foreach ($d as $e => $f) {
                        $trace .= '<tr><td><b>' . strval($a) . '#</b></td><td align="right"><u>args:</u></td> <td><u>' . $e . '</u>:</td><td><i>' . $f . '</i></td></tr>';
                    }
                } else {
                    $trace .= '<tr><td><b>' . strval($a) . '#</b></td><td align="right"><u>' . $c . '</u>:</td><td></td><td><i>' . $d . '</i></td>';
                }
            }
        }
        $trace .= '</table>';
        return '<br /><br /><br /><font face="Verdana"><center><fieldset style="width: 66%; border: 4px solid white; background: black;"><legend><b>[</b>PHP PDO Error ' . strval($err->getCode()) . '<b>]</b></legend> <table border="0"><tr><td align="right"><b><u>Message:</u></b></td><td><i>' . $err->getMessage() . '</i></td></tr><tr><td align="right"><b><u>Code:</u></b></td><td><i>' . strval($err->getCode()) . '</i></td></tr><tr><td align="right"><b><u>File:</u></b></td><td><i>' . $err->getFile() . '</i></td></tr><tr><td align="right"><b><u>Line:</u></b></td><td><i>' . strval($err->getLine()) . '</i></td></tr><tr><td align="right"><b><u>Trace:</u></b></td><td><br /><br />' . $trace . '</td></tr></table></fieldset></center></font>';
    }
}

/**
 * Ensures user query has proper limits
 *
 * @param string $string
 *
 * @return string
 */
function userQueryLimit($string) {
        
    preg_match('~(?<=\blimit\s)\s*(?<limit>\d+)\s*(,\s*\d+|\soffset\s+\d+)?\s*$~i', $string, $limitStr);
    
    if (isset($limitStr['limit'])) {
        
        $maxLimit = min((int)$limitStr['limit'], MAX_USER_QUERY_LIMIT);
        
        $query = preg_replace('~(?<=\blimit\s)\s*\d+\s*(,\s*\d+|\soffset\s+\d+)?\s*$~i', MAX_USER_QUERY_LIMIT .'$1', $query);
    }
    else $string .= "\nLIMIT 0, " . MAX_USER_QUERY_LIMIT;
    
    return $string;
}

/**
 * Hides IPs and Emails
 *
 * @param string $value
 * @param int $i
 *
 * @return string
 */
function obfuscateResult($value, $i = 0) {
    
    $pattern = "/([0-9]{2,3})([^0-9a-zA-Z]+)[0-9]{1,3}([^0-9a-zA-Z]+)[0-9]{1,3}([^0-9a-zA-Z]+)[0-9]{1,3}/";
    
    if (preg_match($pattern, $value)) {
    
        return preg_replace(
            $pattern,
            '${1}${2}' . str_pad(
                0,
                mt_rand(2, 3),
                0
            ) . '${3}' . str_pad(
                0,
                mt_rand(2, 3),
                0
            ) . '${4}' . str_pad(
                $i++,
                mt_rand(2, 3),
                0,
                STR_PAD_LEFT
            ),
            $value
        );
    }
    
    $pattern = "/[_a-z0-9-]+(\.[_a-z0-9-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4}))+/";
    
    if (preg_match($pattern, $value)) {
    
        return preg_replace(
            $pattern,
            "hidden_" . (string)$i . "@$2",
            $value
        );
    }
    
    return $value;
}

/**
 * Catch bad expressions/tables
 *
 * @return bool
 */
function badQuery() {
    
    global $db, $allowedtables;
    
    $stmt = $db->query("SHOW TABLES");    
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    foreach ($tables as $key => $value) if (in_array($value, $allowedtables)) unset($tables[$key]);
    
    if (preg_match("/" . implode("|", $tables) . "|show\stable|schema/i", post('y'))) {
        
        message("We didn't like that query. Try something else.");
        return true;
    }
    
    return false;
}

/**
 * Track a potentially malicious query
 *
 * @return void
 */
function logBadQuery() {
    
    global $db;
            
    $stmt = $db->prepare("INSERT INTO TrafficMalicious (Query, TrafficId, Time)
                        VALUES (?, ?, NOW())");
                        
    $stmt->execute(array(post('y'), $_SESSION['traffic']));
}
