<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
    
        <title><?=isset($codesamples[$_GET['r']][1]) ? $codesamples[$_GET['r']][1] . ' - ' : '' ?>Code Samples - <?=SITE_NAME?></title>
        
        <style type="text/css">
            
            <?php if (empty($_GET)): ?>
            #body {
                width: 588px;
            }
            <?php endif; ?>
        
        </style>
        
        <?php include 'include/template/head.php' ?>
        
        <script type="text/javascript" src="<?=version('js/jquery.tablesorter.js', true)?>"></script>
    
    </head>
    
    <body>
        
        <?php include 'include/template/global/header.php' ?>
            
            <?php if (empty($_GET)) include 'include/template/global/side.php' ?>
        
        <div id="body"><?php
        
            if (isset($_GET['r'])) {
            
                $path = 'include/template/code-samples/' . @$codesamples[$_GET['r']][0];
            
                if (file_exists(SERVER_ROOT . $path)) {
                    
                    include 'include/template/code-samples/sample.php';
                    include 'include/template/global/comments-large.php';
                }
                else {

                    header("HTTP/1.0 404 Not Found");
                    include 'include/template/global/404.php';
                }
            }
            else include 'include/template/code-samples/list.php';
            
        ?></div>
        
        <div class="clear"></div>
    
        <?php include 'include/template/global/footer.php' ?>
        
    </body>
    
</html>