<?php

function parse_http_response_header(array $headers) {
	
	$responses = array();
	$buffer = NULL;
	
	foreach ($headers as $header) {
		
		if ('HTTP/' === substr($header, 0, 5)) {
			
			// add buffer on top of all responses
			if ($buffer) array_unshift($responses, $buffer);
			$buffer = array();
				
			list($version, $code, $phrase) = explode(' ', $header, 3) + array('', FALSE, '');
			
			$buffer['status'] = array(
				'line' => $header, 
				'version' => $version, 
				'code' => (int) $code, 
				'phrase' => $phrase
			);
			
			$fields = &$buffer['fields'];
			$fields = array();
			continue;
		}
		
		list($name, $value) = explode(': ', $header, 2) + array('', '');
		
		// header-names are case insensitive
		$name = strtoupper($name);
		
		// values of multiple fields with the same name are normalized into
		// a comma separated list (HTTP/1.0+1.1)
		if (isset($fields[$name])) {
			
			$value = $fields[$name].','.$value;
		}
		
		$fields[$name] = $value;
	}
	
	unset($fields); // remove reference
	array_unshift($responses, $buffer);
	
	return $responses;
}