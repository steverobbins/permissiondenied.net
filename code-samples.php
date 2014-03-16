<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <title><?php
            $title = isset($codesamples[@$_GET['r']][1]) ? $codesamples[$_GET['r']][1] : '';
            echo $title ? $title . ' - ' : '';
        ?>Code Samples - <?php echo SITE_NAME ?></title>

        <style type="text/css">

            <?php if (empty($_GET)): ?>
            #body {
                width: 588px;
            }
            <?php endif; ?>

        </style>

        <?php template('global/head') ?>

        <script type="text/javascript" src="<?php echo version('js/jquery.tablesorter.js', true) ?>"></script>

    </head>

    <body>

        <?php template('global/header') ?>

            <?php if (empty($_GET)) template('global/side', array('code-samples' => $codesamples)) ?>

        <div id="body"><?php

            if (isset($_GET['r'])) {

                $path = getRealTemplatePath('code-samples/' . @$codesamples[$_GET['r']][0]);

                if ($path) {

                    template('code-samples/sample', array('path' => $path, 'title' => $title));
                    template('global/comments-large');
                }
                else {

                    header("HTTP/1.0 404 Not Found");
                    template('global/404');
                }
            }
            else template('code-samples/list', array('code-samples' => $codesamples));

        ?></div>

        <div class="clear"></div>

        <?php template('global/footer') ?>

    </body>

</html>
