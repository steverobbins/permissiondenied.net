<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title>Resume of Steven Robbins - <?php echo SITE_NAME?></title>
        
        <?php template('global/head.php') ?>
    
    </head>
    
    <body>
        
        <?php template('global/header.php') ?>
        
        <div id="body"><?php template('resume.php') ?></div>
        
        <div class="clear"></div>
    
        <?php template('global/footer.php') ?>
        
    </body>
    
</html>