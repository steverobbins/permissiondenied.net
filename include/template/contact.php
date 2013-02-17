<h2>Contact Me</h2>

<form method="post" class="formatted med">

    <div class="row">
    
        <label for="email">Email</label>
        
        <input type="text" name="email" id="email" value="<?=@post('l')?>" />
    
    </div>

    <div class="row">
    
        <label for="message">Message</label>
        
        <textarea id="message" name="message"><?=@post('e')?></textarea>
    
    </div>
    
    <div class="row">
    
        <input type="submit" name="submit" value="Submit" />
    
    </div>

</form>