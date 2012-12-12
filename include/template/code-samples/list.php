<h2>Code Samples</h2>

<ul>

	<?php foreach ($codesamples as $key => $value): ?>

		<li><a href="<?=ROOT?>code-samples/<?=$key?>"><?=$value[1]?></a></li>
	
	<?php endforeach ?>

</ul>