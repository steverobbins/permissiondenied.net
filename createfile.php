<?php

include 'include/global.php';

notPublic();

ini_set("display_errors", 1);

$file = file_get_contents($_SERVER["DOCUMENT_BASE"] ."/" . $_GET['file'] . "." . $_GET['ext']);

$new = $_GET['file'] . "." . $_GET['stamp'] . "." . $_GET['ext'];

$fh = fopen($new, 'w') or die("can't open file");
fwrite($fh, $file);
fclose($fh);

header("Location: ../" . $new);