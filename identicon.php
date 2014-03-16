<?php

    include 'include/global.php';    
    
    if (isset($_GET['hashText'])) {
        
        header("Location: " . BASE . "identicon/" . (!empty($_GET['imageSize']) ? ((int)$_GET['imageSize'] <= 0 ? 32 : $_GET['imageSize']) : 32) . "/" . (isset($_GET['hashValue']) ? md5($_GET['hashText']) : $_GET['hashText']) . '.png');
    }

    if (isset($_GET['hash'])) {
    
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
        
        identicon($_GET['hash'], (isset($_GET['size']) ? ((int)$_GET['size'] > 600 ? 600 : ((int)$_GET['size'] <= 0 ? 32 : $_GET['size'])) : 32));        
    }
    
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title>PHP Identicon Generator - <?php echo SITE_NAME ?></title>
        
        <style type="text/css">
        
            #body {
                width: 588px;
            }
        
        </style>
        
        <?php template('global/head.php') ?>
        
        <meta name="description" content="A simple API to create an identicon bashed on a hash string." />
        
        <meta name="keywords" content="identicon, hash, md5, creator, api, pixel, size, image, png" />
    
    </head>
    
    <body>
        
        <?php template('global/header.php') ?>
        
        <?php template('global/side.php') ?>
        
        <div id="body"><?php template('identicon.php') ?></div>
        
        <div class="clear"></div>
    
        <?php template('global/footer.php') ?>
        
    </body>
    
</html>