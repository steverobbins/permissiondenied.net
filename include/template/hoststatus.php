<p>Enter your hosts (separated by line)</p>
<textarea id="hosts" style="width: 500px; height: 200px;">google.com
yahoo.com
bing.com
ebay.com
stackoverflow.com
tumblr.com
permissiondenied.net
pd-cdn.net</textarea><br />
<button onclick="startPing()">Go!</button>
<div id="counts"><span id="countDown">0</span> Down | <span id="countUp">0</span> Up | <span id="countPercent">0</span></div>
<div id="sort">Sort by: <button class="alphabetical">Alphabetical</button> <button class="status">Status</button> <button class="original">Original</button></div>
<!--div id="display">Display: <button class="fitRows">Rows</button> <button class="fitColumns">Columns</button> <button class="straightDown">Vertical</button> <button class="straightAcross">Horizontal</button> <button class="masonry">Masonry</button></div-->
<div id="results"></div>

<?php include 'include/template/global/comments-small.php' ?>