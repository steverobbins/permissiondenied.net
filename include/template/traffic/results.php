<h2><a href="<?php echo BASE  ?>traffic">Traffic</a> - Query</h2>

<pre class="codesample"><?php echo $row['Query'] ?></pre>

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
        foreach($r as $v) echo "<td>" . htmlentities($v) . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";

    echo "</table>";

?>

<?php template('traffic/form', array('query' => $row['Query'])) ?>
