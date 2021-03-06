<?php

    include 'include/global.php';
    include 'include/function.contact.php';
    
    if (isset($_POST['submit']) && !validateContact()) sendContact();
    
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title>Site Traffic - <?php echo SITE_NAME ?></title>
        
        <style type="text/css">
        
            #body {
                width: 588px;
            }
        
        </style>
        
        <link rel="stylesheet" type="text/css" href="<?php echo version('css/form.css', true) ?>" />
        
        <?php template('global/head') ?>
    
    </head>
    
    <body>
        
        <?php template('global/header') ?>
        
        <div id="body"><?php template('contact') ?></div>
            
        <?php template('global/side', array('code-samples' => $codesamples)) ?>
        
        <div class="clear"></div>
    
        <?php template('global/footer') ?>
        
    </body>
    
</html>