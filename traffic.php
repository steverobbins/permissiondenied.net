<?php

    include 'include/global.php';
    include 'include/function.traffic.php';
    include 'include/GeoIP/geoipcity.inc';

    if (isset($_POST['submit'])) {

        if (!badQuery()) {

            $stmt = $db->prepare("INSERT INTO TrafficCustom (Query, Result, TrafficId, Time)
                                VALUES (?, ?, ?, NOW())");

            $query = userQueryLimit($_POST['query']);

            $stmt->execute(array($query, json_encode(userQuery($query)), $_SESSION['traffic']));

            $stmt = $db->prepare("SELECT Id, Time
                                FROM TrafficCustom
                                WHERE Id = ?");

            $stmt->execute(array($db->lastInsertId()));
            $row = $stmt->fetch();

            header("Location: " . BASE . "traffic/" . $row['Id']);
            exit;
        }
        else logBadQuery();
    }

    if (empty($_GET['custom'])) $page = 'traffic/stats';
    else {

        $page = 'traffic/results';

        $stmt = $db->prepare("SELECT Query, Result, Time
                            FROM TrafficCustom
                            WHERE Id = ?");

        $stmt->execute(array($_GET['custom']));

        if ($stmt->rowCount() < 1) {

            header("HTTP/1.0 404 Not Found");
            $page = "global/404";
        }
        else {

            $row = $stmt->fetch();
            $result = json_decode($row['Result'], true);

            message("You are viewing cached results from " . datetime($row['Time']) . ".", null);
            message("For an updated view, simply re-submit this query at the bottom of the page.", null);

            if (!is_array($result[0])) {

                //if (!$bad) message("Good job. You broke it.");
                $page = "traffic/error";
            }
        }
    }

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>

        <title>Site Traffic - <?php echo SITE_NAME ?></title>

        <style type="text/css">

            <?php if (!isset($_GET['id'])): ?>
            #body {
                width: 588px;
            }
            <?php endif; ?>

            #custom textarea {
                display: block;
                width: 100%;
                height: 200px;
            }

        </style>

        <?php template('global/head') ?>

        <script type="text/javascript" src="<?php echo version('js/jquery.tablesorter.js', true) ?>"></script>

    </head>

    <body>

        <?php template('global/header') ?>

        <div id="body"><?php template($page, array('allowed-tables' => $allowedtables)) ?></div>

        <?php if (!isset($_GET['id'])) template('global/side', array('code-samples' => $codesamples)) ?>

        <div class="clear"></div>

        <?php template('global/footer') ?>

    </body>

</html>
