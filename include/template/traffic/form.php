<h4>Query</h4>

<form method="post" id="custom">

    <textarea name="query"><?php echo isset($_POST['query']) ? $_POST['query'] : @$template['query'] ?></textarea>

    <input type="submit" name="submit" value="Submit" />

</form>
