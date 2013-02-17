<?php

    include 'include/global.php';
    include 'include/function.contact.php';
    
    if (post() && !validateContact()) sendContact();
    
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title>Site Traffic - <?=SITE_NAME?></title>
        
        <style type="text/css">
        
            #body {
                width: 588px;
            }
        
        </style>
        
        <link rel="stylesheet" type="text/css" href="<?=version('css/form.css', true)?>" />
        
        <?php include 'include/template/global/head.php' ?>
    
    </head>
    
    <body>
        
        <?php include 'include/template/global/header.php' ?>
            
            <?php include 'include/template/global/side.php' ?>
        
        <div id="body"><?php include 'include/template/contact.php' ?></div>
        
        <div class="clear"></div>
    
        <?php include 'include/template/global/footer.php' ?>
        
    </body>
    
</html>