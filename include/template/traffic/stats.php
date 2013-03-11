<h2>Traffic</h2>

<i>All stats are for the last 30 days</i>

<?php

    $stmt = $db->query("SELECT COUNT(DISTINCT IpId) Count
                        FROM Traffic
                        WHERE Time > NOW() - INTERVAL 1 MONTH");
                        
    $row = $stmt->fetch();

?>

<h3>Unique Visitors: <?=$row['Count']?></h3>

<h3>Top 10 Pages</h3>

<table class="sortable">

    <thead>
    
        <tr>
    
            <th>Hits</th>
            <th>URL</th>
            <th>Last Visit</th>
            
        </tr>
    
    </thead>
    
    <tbody>

    <?php
    
        $stmt = $db->query("SELECT COUNT(DISTINCT IpId) Count, Value, MAX(Time) Time
                            FROM Traffic
                            INNER JOIN TrafficPage
                            ON TrafficPage.Id = Traffic.PageId
                            WHERE Value NOT LIKE '%.css'
                            AND Value NOT LIKE '%.js'
                            AND Value NOT LIKE '%.png'
                            AND Value NOT LIKE '%.ico'
                            AND Value NOT LIKE '/ajax/%'
                            AND Time > NOW() - INTERVAL 1 MONTH
                            GROUP BY PageId
                            ORDER BY Count DESC, Time DESC
                            LIMIT 10");
                            
        while($row = $stmt->fetch()) {
            
            echo "<tr><td>{$row['Count']}</td><td><a href=\"" . WEB_ROOT . substr($row['Value'], 1) . "\" target=\"_blank\">{$row['Value']}</a></td><td>" . datetime($row['Time']) . "</td></tr>";
        }
    
    ?>

    </tbody>
    
</table>

<h3>Top 10 Browsers</h3>

<table class="sortable">

    <thead>
    
        <tr>
    
            <th>Hits</th>
            <th>Browser</th>
        
        </tr>
    
    </thead>
    
    <tbody>

    <?php
    
        $stmt = $db->query("SELECT COUNT(DISTINCT IpId) Count, Value
                            FROM Traffic
                            INNER JOIN TrafficAgent
                            ON TrafficAgent.Id = Traffic.AgentId
                            WHERE Time > NOW() - INTERVAL 1 MONTH
                            GROUP BY AgentId
                            ORDER BY Count DESC, Value");
                            
        $browsers = array();                            
        while($row = $stmt->fetch()) $browsers = browserGroup($browsers, $row['Value'], $row['Count']);
        arsort($browsers);
        $browsers = array_slice($browsers, 0, 10);
        foreach($browsers as $key => $value) echo "<tr><td>{$value}</td><td>$key</td></tr>";
    
    ?>

    </tbody>
    
</table>

<h3>Top 10 Regions</h3>

<table class="sortable">

    <thead>
    
        <tr>
        
            <th>Hits</th>
            <th>Region</th>
            
        </tr>
    
    </thead>
    
    <tbody>

    <?php
    
        $stmt = $db->query("SELECT COUNT(DISTINCT IpId) Count, Value
                            FROM Traffic
                            INNER JOIN TrafficIp
                            ON TrafficIp.Id = Traffic.IpId
                            WHERE Time > NOW() - INTERVAL 1 MONTH
                            GROUP BY IpId, Value
                            ORDER BY Count DESC, Time DESC");
                            
        $cities = array();                            
        while($row = $stmt->fetch()) $cities = cityGroup($cities, $row['Value'], $row['Count']);
        arsort($cities);
        $cities = array_slice($cities, 0, 10);
        foreach($cities as $key => $value) echo "<tr><td>{$value}</td><td>$key</td></tr>";
    
    ?>

    </tbody>
    
</table>

<?php if (isset($_GET['show'])): ?>

<h3>Recent User Queries</h3>

<table class="sortable">

    <thead>
    
        <tr>
        
            <th>Query</th>
            <th>When</th>
            
        </tr>
    
    </thead>
    
    <tbody>

    <?php
    
        $stmt = $db->query("SELECT TrafficCustom.Id, TrafficCustom.Query, TrafficCustom.Time
                            FROM TrafficCustom
                            WHERE TrafficCustom.Time > NOW() - INTERVAL 1 MONTH
                            ORDER BY TrafficCustom.Time DESC
                            LIMIT 10");
                          
        while($row = $stmt->fetch()) echo "<tr><td><a href=\"" . BASE . "traffic/{$row['Id']}\">" . nl2br(charLimit($row['Query'], 100)) . "</a></td><td>" . datetime($row['Time']) . "</td></tr>";
    
    ?>

    </tbody>
    
</table>

<h3>Recent User Query Count</h3>

<table class="sortable">

    <thead>
    
        <tr>
        
            <th>Region</th>
            <th>Requests</th>
            
        </tr>
    
    </thead>
    
    <tbody>

    <?php
    
        $stmt = $db->query("SELECT Value, COUNT(*) Count
                            FROM Traffic
                            INNER JOIN TrafficCustom
                            ON TrafficCustom.`TrafficId` = Traffic.`Id`
                            INNER JOIN TrafficIp
                            ON TrafficIp.`Id` = Traffic.`IpId`
                            WHERE TrafficCustom.Time > NOW() - INTERVAL 1 MONTH
                            GROUP BY Value
                            ORDER BY Count DESC, TrafficCustom.Time");
                            
        $cities = array();                            
        while($row = $stmt->fetch()) echo "<tr><td>" . regionFromIp($row['Value']) . "</td><td>{$row['Count']}</td></tr>";
    
    ?>

    </tbody>
    
</table>

<h3>Malicious Attempts</h3>

<table class="sortable">

    <thead>
    
        <tr>
        
            <th>Region</th>
            <th>Requests</th>
            
        </tr>
    
    </thead>
    
    <tbody>

    <?php
    
        $stmt = $db->query("SELECT Value, COUNT(*) Count
                            FROM Traffic
                            INNER JOIN TrafficMalicious
                            ON TrafficMalicious.`TrafficId` = Traffic.`Id`
                            INNER JOIN TrafficIp
                            ON TrafficIp.`Id` = Traffic.`IpId`
                            WHERE TrafficMalicious.Time > NOW() - INTERVAL 1 MONTH
                            GROUP BY Value
                            ORDER BY Count DESC, TrafficMalicious.Time");
                                                       
        while($row = $stmt->fetch()) echo "<tr><td>" . regionFromIp($row['Value']) . "</td><td>{$row['Count']}</td></tr>";
    
    ?>

    </tbody>
    
</table>

<?php endif ?>

<h3>Or Entry Your Own Query</h3>

<p>See Examples:</p>

<?php include 'include/template/traffic/list.php' ?>

<?php include 'include/template/traffic/form.php' ?>

<?php include 'include/template/traffic/tables.php' ?>

<?php include 'include/template/global/comments-small.php' ?>