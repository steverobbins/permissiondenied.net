<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title>jQuery Binary Clock - <?php echo SITE_NAME ?></title>
        
        <?php template('global/head') ?>

        <link rel="stylesheet" type="text/css" href="<?php echo version('css/binaryclock.css', true) ?>">

        <script type="text/javascript" src="<?php echo version('js/binaryclock.js', true) ?>"></script>
    
    </head>
    
    <body>
        
        <?php template('binaryclock') ?>

    </body>
    
</html>