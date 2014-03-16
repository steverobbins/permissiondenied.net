<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title>404 - Not Found | <?php echo SITE_NAME ?></title>
        
        <style type="text/css">
        
            #body {
                width: 588px;
            }
        
        </style>
        
        <?php template('global/head') ?>
    
    </head>
    
    <body>
        
        <?php message("Good job. You broke it."); template('global/header') ?>
        
        <div id="body"><?php template('global/404') ?></div>
        
        <?php template('global/side', array('code-samples' => $codesamples)) ?>
        
        <div class="clear"></div>
    
        <?php template('global/footer') ?>
        
    </body>
    
</html>