<h2>&nbsp;</h2>

<ul>

    <?php foreach ($codesamples as $key => $value): ?>

        <li><a href="<?=BASE?>code-samples/<?=$key?>"><?=$value[1]?></a></li>
    
    <?php endforeach ?>

</ul>