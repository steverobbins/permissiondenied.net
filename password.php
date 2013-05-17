<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title>Password Generator<?=SITE_NAME?></title>
        
        <style type="text/css">
        
            #body {
                width: 588px;
            }
        
        </style>

        <link rel="stylesheet" type="text/css" href="<?=version('css/password.css', true)?>" />
        
        <?php include 'include/template/global/head.php' ?>

        <script type="text/javascript" src="<?=version('js/jquery.password.js', true)?>"></script>
    
    </head>
    
    <body>
        
        <?php include 'include/template/global/header.php' ?>
        
        <?php include 'include/template/global/side.php' ?>
        
        <div id="body"><?php include 'include/template/password.php' ?></div>
        
        <div class="clear"></div>
    
        <?php include 'include/template/global/footer.php' ?>
        
    </body>
    
</html>