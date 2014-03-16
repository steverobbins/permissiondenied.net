<?php if (isset($codesamples)): ?>
<h2>&nbsp;</h2>

<ul>

    <?php foreach ($codesamples as $key => $value): ?>

        <li><a href="<?php echo BASE ?>code-samples/<?php echo $key?>"><?php echo $value[1]?></a></li>

    <?php endforeach ?>

</ul>
<?php endif ?>
