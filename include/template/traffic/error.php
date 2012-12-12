<h2><a href="<?=ROOT?>traffic">Custom Analytics</a> - Query</h2>

<pre class="codesample"><?=$row['Query']?></pre>

<h3>Result</h3>

<?php

    echo "<pre>";    
    if(!is_array($result)) echo $result;
    else echo $result[2];
    //else foreach($result as $value) echo $value . "\n";
    echo "</pre>";
    
    include 'include/template/traffic/form.php';

?>