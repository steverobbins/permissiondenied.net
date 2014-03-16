<?php

$queryCount = $db->queryCount();

?>
<div id="footer">

    <p>This work by <a href="<?php echo BASE  ?>contact">Steven Robbins</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/deed.en_US">Creative Commons Attribution 3.0 Unported License</a><br />Based on a work at <a href="http://permissiondenied.net">http://permissiondenied.net</a> and <a href="http://pd-cdn.net">http://pd-cdn.net</a>.</p>

    <p>

        <a href="<?php echo BASE  ?>contact">Contact</a> |
        <a href="<?php echo BASE  ?>resume">Resume</a> |
        <a href="https://github.com/steverobbins/permissiondenied.net" target="_blank">Fork Me</a> |
        <a href="<?php echo BASE  ?>privacy-policy">Privacy Policy</a> |
        <a href="<?php echo BASE  ?>terms-of-use">Terms of Use</a>
        <br />
        <?php echo $queryCount ?> MySQL Quer<?php echo $queryCount == 1 ? 'y' : 'ies' ?> | Page rendered in <?php echo microtime() - REQUEST_TIME_START ?> seconds

    </p>

</div>
