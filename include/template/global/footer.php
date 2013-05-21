<div id="footer">
    
    <p>This work by <a href="http://permissiondenied.net/contact">Steven Robbins</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/deed.en_US">Creative Commons Attribution 3.0 Unported License</a><br />Based on a work at <a href="http://permissiondenied.net">http://permissiondenied.net</a> and <a href="http://pd-cdn.net">http://pd-cdn.net</a>.</p>
    
    <p><a href="<?=BASE?>contact">Contact</a> | <a href="<?=BASE?>resume">Resume</a> | <a href="https://github.com/steverobbins/permissiondenied.net" target="_blank">Fork Me</a> | <a href="<?=BASE?>privacy-policy">Privacy Policy</a> | <a href="<?=BASE?>terms-of-use">Terms of Use</a><br /><a href="http://stackoverflow.com/q/12850886/763468" title="How I Did It" target="_blank"><?=$db->queryCount()?> MySQL Quer<?=$db->queryCount() == 1 ? 'y' : 'ies' ?></a> | Page rendered in <?=microtime() - RENDER_TIME_START?> seconds</p>

</div>