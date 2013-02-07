<div id="footer">

    <?php /* <p id="badges">
    
        <a href="http://validator.w3.org/check?uri=referer" target="_blank"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" title="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
        
        <a href="http://stackexchange.com/users/398665/steve-robbins" target="_blank"><img src="http://stackexchange.com/users/flair/398665.png" width="111" height="31" alt="profile for Steve Robbins on Stack Exchange, a network of free, community-driven Q&amp;A sites" title="profile for Steve Robbins on Stack Exchange, a network of free, community-driven Q&amp;A sites" /></a>
        
        <a rel="license" href="http://creativecommons.org/licenses/by/3.0/deed.en_US" target="_blank"><img alt="Creative Commons License" title="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by/3.0/88x31.png" height="31" width="88" /></a>
        
        <a href="https://safeweb.norton.com/report/show?url=permissiondenied.net" target="_blank"><img alt="Norton" src="https://safeweb.norton.com/images/Noron-Secured.png" height="33" width="87" /></a>

    <a href="//www.cloudflare.com" target="_blank" style="width:89px;height:31px;background:transparent url(//ajax.cloudflare.com/cdn-cgi/custom/images/badges-gray.png) no-repeat -482px -0px;display:inline-block"></a>
        
    </p> */ ?>
    
    <p>This work by <a href="http://permissiondenied.net/contact">Steven Robbins</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/deed.en_US">Creative Commons Attribution 3.0 Unported License</a><br />Based on a work at <a href="http://permissiondenied.net">http://permissiondenied.net</a> and <a href="http://pd-cdn.net">http://pd-cdn.net</a>.</p>
    
    <p><a href="<?=BASE?>contact">Contact</a> | <a href="<?=BASE?>resume">Resume</a> | <a href="https://github.com/stevether/permissiondenied.net" target="_blank">Fork Me</a> | <a href="<?=BASE?>privacy-policy">Privacy Policy</a> | <a href="<?=BASE?>terms-of-use">Terms of Use</a><br /><a href="http://stackoverflow.com/q/12850886/763468" title="How I Did It" target="_blank"><?=$db->queryCount()?> MySQL Quer<?=$db->queryCount() == 1 ? 'y' : 'ies' ?></a> | Page rendered in <?=microtime() - RENDER_TIME_START?> seconds</p>


</div>