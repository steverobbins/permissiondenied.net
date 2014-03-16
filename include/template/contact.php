<h2>Contact Me</h2>

<form method="post" class="formatted med">

    <div class="row">
    
        <label for="email">Email</label>
        
        <input type="text" name="email" id="email" value="<?php echo @$_POST['email']?>" />
    
    </div>

    <div class="row">
    
        <label for="message">Message</label>
        
        <textarea id="message" name="message"><?php echo @$_POST['message']?></textarea>
    
    </div>
    
    <div class="row">
    
        <input type="submit" name="submit" value="Submit" />
    
    </div>

</form>