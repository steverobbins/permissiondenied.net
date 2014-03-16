<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title><?php echo SITE_NAME?></title>
        
        <style type="text/css">
        
            #body {
                width: 588px;
            }
        
        </style>
        
        <?php template('global/head.php') ?>
        
        <meta name="description" content="PermissionDenied.net is the personal website of Steven Robbins.  It hosts any projects or apps that he decided to put online for the public.  Steve likes to experiment with new technologies and showcase his work." />
        
        <meta name="keywords" content="permission, denied, steve, steven, robbins, personal, orange county, california, web apps, applications, projects, experimental" />
    
    </head>
    
    <body>
        
        <?php template('global/header.php') ?>
        
        <?php template('global/side.php') ?>
        
        <div id="body"><?php template('home.php') ?></div>
        
        <div class="clear"></div>
    
        <?php template('global/footer.php') ?>
        
    </body>
    
</html>