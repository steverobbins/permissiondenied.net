<h2><a href="<?php echo BASE  ?>traffic">Traffic</a> - Query</h2>

<pre class="codesample"><?php echo $template['row']['Query'] ?></pre>

<h3>Result</h3>

<?php

    echo "<pre>";    
    if(!is_array($template['result'])) echo $template['result'];
    else echo $template['result'][2];
    //else foreach($result as $value) echo $value . "\n";
    echo "</pre>";
    
    template('traffic/form', array('query' => $template['row']['Query']));

?>