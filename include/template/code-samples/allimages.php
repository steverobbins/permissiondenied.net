<?php

// scanDirectoryImages("images");

function scanDirectoryImages($directory) {
    
    if (substr($directory, -1) == '/') $directory = substr($directory, 0, -1);
    
    if (is_readable($directory) && (file_exists($directory) || is_dir($directory))) {
        
        $directoryTree = array();
        $directoryList = opendir($directory);
        
        while($file = readdir($directoryList)) {
            
            if ($file != '.' && $file != '..') {
                
                $path = $directory . '/' . $file;
                
                if (is_readable($path)) {
                    
                    if (is_dir($path)) return scanDirectoryImages($path);
                    
                    if (is_file($path) && in_array(end(explode('.', end(explode('/', $path)))), array('jpeg', 'jpg', 'gif', 'png')))
                        echo '<a href="' . $path . '"><img src="' . $path . '" style="max-height: 100px; max-width: 100px;" /></a>';
                }
            }
        }
        
        closedir($directoryList);
    }
}