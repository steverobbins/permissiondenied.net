<h4>Query</h4>

<form method="post" id="custom">

    <textarea name="query"><?=isset(post('y')) ? post('y') : @$row['Query']?></textarea>
    
    <input type="submit" name="submit" value="Submit" />

</form>

<!--i>This feature has been disabled.</i-->