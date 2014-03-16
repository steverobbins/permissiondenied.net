<?php

    include 'include/global.php';
    include 'include/function.password.php'

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>

        <title>Password Generator - <?php echo SITE_NAME ?></title>

        <style type="text/css">

            #body {
                width: 588px;
            }

        </style>

        <link rel="stylesheet" type="text/css" href="<?php echo version('css/password.css', true) ?>" />

        <?php template('global/head.php') ?>

        <script type="text/javascript" src="<?php echo version('js/jquery.password.js', true) ?>"></script>

    </head>

    <body>

        <?php template('global/header.php') ?>

        <?php template('global/side.php') ?>

        <div id="body"><?php template('password.php') ?></div>

        <div class="clear"></div>

        <?php template('global/footer.php') ?>

    </body>

</html>
