<h3>Available Tables</h3>

<pre class="codesample"><?php

    foreach($allowedtables as $table) {
        
        $stmt = $db->query("DESCRIBE $table");
        
        echo "------------------------------------------\n" . $table . "\n------------------------------------------\n";
        
        while($row = $stmt->fetch()) echo str_pad($row['Field'], 20) . $row['Type'] . "\n";
        
        echo "\n";
    }

?></pre>