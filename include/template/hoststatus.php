<p>Enter your hosts (separated by line)</p>

<textarea id="hosts" style="width: 500px; height: 200px;">google.com
yahoo.com
bing.com
ebay.com
stackoverflow.com
permissiondenied.net</textarea>

<br />

<button onclick="startPing()">Go!</button>
<div id="counts"><span id="countDown">0</span> Down | <span id="countUp">0</span> Up | <span id="countPercent">0</span></div>
<div id="sort">Sort by: <button class="alphabetical">Alphabetical</button> <button class="status">Status</button> <button class="original">Original</button></div>
<div id="results"></div>

<?php template('global/comments-small') ?>
