<h2><a href="<?php echo BASE ?>code-samples">Code Samples</a> - <?php echo $codesamples[$_GET['r']][1]?></h2>

<pre class="codesample"><?php echo htmlentities(file_get_contents($path))?></pre>