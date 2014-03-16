<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title><?php echo SITE_NAME?>'s .htaccess File - <?php echo SITE_NAME ?></title>
        
        <style type="text/css">
        
            #body {
                width: 588px;
            }
        
        </style>
        
        <?php template('global/head') ?>
    
    </head>
    
    <body>
        
        <?php template('global/header') ?>
        
        <div id="body"><?php template('htaccess') ?></div>
        
        <?php template('global/side', array('code-samples' => $codesamples)) ?>
        
        <div class="clear"></div>
    
        <?php template('global/footer') ?>
        
    </body>
    
</html>