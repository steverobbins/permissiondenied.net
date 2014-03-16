<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title><?php echo $_GET['e']?> | <?php echo SITE_NAME ?></title>
        
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
        
        <div id="body" class="alignC">
        
            <p style="font-size: 24em"><?php echo $_GET['e'] ?></p>
            
            <?php if (isset($httpcodes[(int)$_GET['e']])): ?>
            
            <p><?php echo $httpcodes[$_GET['e']] ?></p>
            
            <?php endif; ?>
            
        </div>
        
        <div class="clear"></div>
    
        <?php template('global/footer.php') ?>
        
    </body>
    
</html>