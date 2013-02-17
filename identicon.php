<?php

    include 'include/global.php';    
    
    if (get()) {
        
        header("Location: " . BASE . "identicon/" . (!get('') ? ((int)get('e') <= 0 ? 32 : get('e')) : 32) . "/" . (get() ? md5(get('t')) : get('t')) . '.png');
    }

    if (get()) {
    
        header("Content-Type: image/png");
            
        header("Cache-Control: private, max-age=31449600, pre-check=31449600");
        header("Pragma: private");
        header("Expires: " . date(DATE_RFC822, strtotime("2 day")));
        
        if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
            
            header('Last-Modified: ' . $_SERVER['HTTP_IF_MODIFIED_SINCE'], true, 304);
            exit;
        }
            
        header('Last-Modified: ' . date("m/j/y h:i", time()));
        
        include 'include/function.identicon.php';
        
        identicon(get('h'), (get() ? ((int)get('e') > 600 ? 600 : ((int)get('e') <= 0 ? 32 : get('e'))) : 32));        
    }
    
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title>Identicon Creator API - <?=SITE_NAME?></title>
        
        <style type="text/css">
        
            #body {
                width: 588px;
            }
        
        </style>
        
        <?php include 'include/template/global/head.php' ?>
        
        <meta name="description" content="A simple API to create an identicon bashed on a hash string." />
        
        <meta name="keywords" content="identicon, hash, md5, creator, api, pixel, size, image, png" />
    
    </head>
    
    <body>
        
        <?php include 'include/template/global/header.php' ?>
        
        <?php include 'include/template/global/side.php' ?>
        
        <div id="body"><?php include 'include/template/identicon.php' ?></div>
        
        <div class="clear"></div>
    
        <?php include 'include/template/global/footer.php' ?>
        
    </body>
    
</html>