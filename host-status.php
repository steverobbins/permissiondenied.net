<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>

        <title>Host Status Tracker - <?php echo SITE_NAME ?></title>

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

        <link rel="stylesheet" type="text/css" href="<?php echo version('css/isotope.css', true) ?>" />

        <?php template('global/head') ?>

        <script type="text/javascript" src="<?php echo version('js/isotope.js', true) ?>"></script>
        <script type="text/javascript" src="<?php echo version('js/jquery.color.js', true) ?>"></script>
        <script type="text/javascript" src="<?php echo version('js/jquery.hoststatus.js', true) ?>"></script>

    </head>

    <body>

        <?php template('global/header') ?>

        <div id="body"><?php template('hoststatus') ?></div>

        <?php template('global/side', array('code-samples' => $codesamples)) ?>

        <div class="clear"></div>

        <?php template('global/footer') ?>

    </body>

</html>
