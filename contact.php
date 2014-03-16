<?php

    include 'include/global.php';
    include 'include/function.contact.php';
    
    if (isset($_POST['submit']) && !validateContact()) sendContact();
    
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title>Site Traffic - <?php echo SITE_NAME?></title>
        
        <style type="text/css">
        
            #body {
                width: 588px;
            }
        
        </style>
        
        <link rel="stylesheet" type="text/css" href="<?php echo version('css/form.css', true)?>" />
        
        <?php template('global/head.php') ?>
    
    </head>
    
    <body>
        
        <?php template('global/header.php') ?>
            
            <?php template('global/side.php') ?>
        
        <div id="body"><?php template('contact.php') ?></div>
        
        <div class="clear"></div>
    
        <?php template('global/footer.php') ?>
        
    </body>
    
</html>