<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title>404 - Not Found | <?php echo SITE_NAME?></title>
        
        <style type="text/css">
        
            #body {
                width: 588px;
            }
        
        </style>
        
        <?php template('global/head.php') ?>
    
    </head>
    
    <body>
        
        <?php message("Good job. You broke it."); template('global/header.php') ?>
        
        <?php template('global/side.php') ?>
        
        <div id="body"><?php template('global/404.php') ?></div>
        
        <div class="clear"></div>
    
        <?php template('global/footer.php') ?>
        
    </body>
    
</html>