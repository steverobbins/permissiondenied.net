<h2><a href="<?=BASE?>traffic">Custom Analytics</a> - Query</h2>

<pre class="codesample"><?=$row['Query']?></pre>

<h3>Result</h3>

<?php
        
    $keys = array();
    foreach($result[0] as $key => $value) $keys[] = $key;
    
    echo "<table class=\"sortable\">";
    
    echo "<thead><tr>";
    foreach($keys as $key) echo "<th>$key</th>";
    echo "</thead></tr>";
    
    echo "<tbody>";
    
    foreach($result as $r) {
        
        echo "<tr>";
        foreach($r as $v) echo "<td>" . $v . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    
    echo "</table>";

?>

<?php include 'include/template/traffic/form.php' ?>