<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title>Host Status Tracker - <?=SITE_NAME?></title>
        
        <style type="text/css">
        
            #body {
                width: 588px;
            }
                
            .response {
                overflow: hidden;
                border: 3px black double;
                margin: 5px;
                padding: 5px;
                color: #000000;
            }
        
        </style>
        
        <link rel="stylesheet" type="text/css" href="<?=version('css/isotope.css', true)?>" />
        
        <?php include 'include/head.php' ?>
        
        <script type="text/javascript" src="<?=version('js/isotope.js', true)?>"></script>
        <script type="text/javascript" src="<?=version('js/jquery.color.js', true)?>"></script>
        <script type="text/javascript" src="<?=version('js/jquery.hoststatus.js', true)?>"></script>
    
    </head>
    
    <body>
        
        <?php include 'include/template/global/header.php' ?>
        
        <?php include 'include/template/global/side.php' ?>
        
        <div id="body"><?php include 'include/template/hoststatus.php' ?></div>
        
        <div class="clear"></div>
    
        <?php include 'include/template/global/footer.php' ?>
        
    </body>
    
</html>