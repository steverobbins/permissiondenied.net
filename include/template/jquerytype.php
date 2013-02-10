<h2>jQuery Type Effect Plugin</h2>
        
<p id="cont"><span id="info"></span><span id="underline"></span></p>

<p>See .js comments for documentation</p>

<h2>Download: <a target="_blank" href="<?=version('js/jquery.type.js')?>">jquery.type.js</a></h2>

<h3>Example</h3>

<pre class="codesample" data-lang="javascript">
var myStrings = new Array(
    'Neo...',
    '&lt;br />Wake up, Neo.',
    '&lt;br />The Matrix has you.'
),
myOptions = {
    charDelay: 100,
    stringDelay: 1000,
    replace: false
};

$('#consoleWindow').type(myStrings, myOptions, function() {    
    alert("All done!");
});
</pre>

<button id="showMe">Show me!</button>

<div id="consoleWindow"></div>

<h3>More examples:</h3>

<button id="c">Marquee</button>

<div style="height: 30px;"></div>

<button id="b">Paragraphs</button>

<div></div>

<?php include 'include/template/global/comments-small.php' ?>