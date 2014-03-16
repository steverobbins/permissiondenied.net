<h2>PHP Identicon Generator</h2>

<p class="alignC"><?php

    for ($i = 0; $i < 9; $i++) {
        
        $s = 64;
        
        echo '<img src="' . WEB_ROOT . '/identicon/' . $s . '/' . md5(rand(0, 20)) . '.png" height="' . $s . '" width="' . $s . '" alt="" />';
    }

?></p>

<form action="<?php echo BASE  ?>identicon" method="get">
    <fieldset>
        <legend>Identicon Creator</legend>
        <label>String: <input type="text" name="hashText" value="<?php echo isset($_GET['h']) ? $_GET['h'] : $_SERVER['REMOTE_ADDR'] ?>" /></label><br />
        <label>Image Size: <input type="text" name="imageSize" value="<?php echo isset($_GET['s']) ? $_GET['s'] : 150 ?>" /></label>px<br />
        <label>Hash It?: <input type="checkbox"<?php echo isset($_GET['v']) ? '' : ' checked="checked"' ?> name="hashValue" value="1" /></label> <em>(using md5)</em><br />
        <input type="submit" />
    </fieldset>
</form>

<p>Or link to it in image srcs:</p>

<ul>
    <li>If you need to hash it:<br />http://permissiondenied.net/identicon/hash/<strong>SizeInPx</strong>/<strong>YourTextHere</strong>.png</li>
    <li>If it's already hashed:<br />http://permissiondenied.net/identicon/<strong>SizeInPx</strong>/<strong>YourTextHere</strong>.png</li>
</ul>

<p>Example usage:<p>

<pre class="codesample" data-lang="php">
$size = 150;
$hash = md5($_SERVER['REMOTE_ADDR']);

$src = "http://permissiondenied.net/identicon/" . $size . "/" . $hash . ".png";

echo '&lt;img src="' . $src . '" height="' . $size . '" width="' . $size . '" alt="Identicon" />';
// &lt;img src="http://permissiondenied.net/identicon/150/cc2f743c0fb8d997586225329dad473d.png" height="150" width="150" alt="Identicon" />
</pre>

<p>Produces:<p>

<?php echo '<img src="http://permissiondenied.net/identicon/150/' . md5($_SERVER['REMOTE_ADDR']) . '.png" height="150" width="150" alt="Identicon" />' ?>

<p>Max image size is 600, default is 32.<br />All images are cached.</p>

<p class="alignC"><?php

    for ($i = 0; $i < 9; $i++) {
        
        echo '<img src="' . WEB_ROOT . '/identicon/' . $s . '/' . md5(rand(0, 20)) . '.png" height="' . $s . '" width="' . $s . '" alt="" />';
    }

?></p>

<?php template('global/comments-small.php') ?>