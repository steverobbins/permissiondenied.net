<style type="text/css">
table {
    border-collapse: collapse;
    border: none
}
td, th {
    border: 1px solid #CCC;
    padding: 5px
}
</style>

<?php

$host = '';
$user = '';
$pass = '';
$db   = '';

$con = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($db, $con) or die(mysql_error());

$tables = mysql_query("SHOW TABLES") or die(mysql_error());

while ($row = mysql_fetch_assoc($tables)) foreach($row as $value) $aTables[] = $value;

$i = 0;
foreach ($aTables as $table) {
    
    $desc = mysql_query("DESCRIBE " . $table);    
    while ($row = mysql_fetch_assoc($desc)) $aFields[$i][] = $row["Field"];
    $i++;
}

for ($i = 0; $i < count($aTables); $i++): ?>

<h2><?php echo $aTables[$i]; ?></h2>

<table><?php
    
    $result = mysql_query("SELECT * FROM " . $aTables[$i]) or die(mysql_error());
	
    echo "<tr>";
    foreach ($aFields[$i] as $field) echo "<th>" . $field . "</th>";
    echo "</tr>";
	
    while ($row = mysql_fetch_assoc($result)) {
        
        echo "<tr>";
        foreach ($aFields[$i] as $field) echo "<td>" . $row[$field] . "</td>";
        echo "</tr>";
    }
    
?></table>

<?php endfor ?>
