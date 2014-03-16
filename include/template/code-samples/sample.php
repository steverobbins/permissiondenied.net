<h2><a href="<?php echo BASE ?>code-samples">Code Samples</a> - <?php echo $template['title'] ?></h2>

<pre class="codesample"><?php echo htmlentities(file_get_contents($template['path'])) ?></pre>
