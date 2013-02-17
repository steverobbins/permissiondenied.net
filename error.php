<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title><?=get('e')?> | <?=SITE_NAME?></title>
        
        <style type="text/css">
        
            #body {
                width: 588px;
            }
        
        </style>
        
        <?php include 'include/template/global/head.php' ?>
    
    </head>
    
    <body>
        
        <?php message("Good job. You broke it."); include 'include/template/global/header.php' ?>
        
        <?php include 'include/template/global/side.php' ?>
        
        <div id="body" class="alignC">
        
            <p style="font-size: 24em"><?=get('e')?></p>
            
            <?php if (isset($httpcodes[(int)get('e')])): ?>
            
            <p><?=$httpcodes[get('e')]?></p>
            
            <?php endif; ?>
            
        </div>
        
        <div class="clear"></div>
    
        <?php include 'include/template/global/footer.php' ?>
        
    </body>
    
</html>