<?php
    
require_once("../include/global.php");

if (isset($_POST['host'])) {
    
    require_once("../include/function.hoststatus.php");
    
    $response = '<div>';
    
    $ourIps = array();
    
    $levels = array('01d33b', '46dc2b', 'a6e815', 'f6ea02', 'ffcb00', 'ff9300', 'fa7604', 'f3550a', 'ec3310', 'e51415');
    
    $startTime = microtime(true);
    
    $url = 'http://' . $_POST['host'] . '/';

    $options['http'] = array('method' => "HEAD");
    
    $context = stream_context_create($options);
    
    $body = @file_get_contents($url, NULL, $context);
    
    if ($body !== false) {
    
        $responses = parse_http_response_header($http_response_header);
        
        $number = count($responses);

        $redirects = $number - 1;
        
        $endTime = microtime(true);
        
        $tripTime = $endTime - $startTime;
        
        $response .= 'Round trip time: ' . round($tripTime, 3) . ' seconds.<br />';
        
        if ($responses[0]['status']['code'] == 200) {
            
            if ($redirects) {
                
                foreach (array_reverse($responses) as $r) {
                    
                    if (!isset($r['fields']['LOCATION']))
                        break;
                        
                    $location = $r['fields']['LOCATION'];
                    $code = $r['status']['code'];
                    
                    $response .= $r['status']['code'] . " " . $r['status']['phrase'] . ": " . $r['fields']['LOCATION'] . "<br />";
                    $from = $location;
                }
            }
            
            $destinationIp = gethostbyname($_POST['host']);
            
            $level = $tripTime > 2 ? 4 : ($tripTime > 1.5 ? 3 :($tripTime > 1 ? 2 : ($tripTime > 0.5 ? 2 : 0)));
            $response .= 'Domain is pointing to <b>' . $destinationIp . '</b>.<br />';
        }
        else {
            
            $level = 8;
        }
        
        $response .= '<strong>Status: ' . $responses[0]['status']['code'] . " " . $responses[0]['status']['phrase'] . '</strong>';
    }
    else {
        
        $level = 9;
        $response .= '<strong>Could not find host.</strong>';
    }
    
    //////////////////////////////////////////////////////////
        
    echo json_encode(array("level" => $levels[$level],
                            "status" => $level,
                            "host" => $_POST['host'],
                            "response" => $response . "</div>"));
    
    unset($output, $status);
}