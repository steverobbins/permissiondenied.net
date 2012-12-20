<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

    <head>
    
        <title>jQuery Type Plugin - <?=SITE_NAME?></title>
        
        <meta name="description" content="This is a jQuery plugin that will 'type' text and/or HTML markup into an HTML element.  It accepts multiple strings for a marquee/console style display.  Strings can either be appended to or replace the current string and a callback can be triggered once complete." />
        
        <meta name="keywords" content="jQuery, javascript, plugin, type, typewriter, type writter, html, typing, effect, append, replace, callback" />
        
        <style type="text/css">
        
            #body {
                width: 588px;
            }            
            
            #underline {
                border-bottom: 1px black solid;
                width: 10px;
                display: inline-block;
            }
        
        </style>
        
        <?php include 'include/template/head.php' ?>
        
        <script type="text/javascript" src="<?=version('js/jquery.type.min.js', true)?>"></script>
        <script type="text/javascript" src="<?=version('js/jquery.blink.js', true)?>"></script>
        
        <script type="text/javascript">
        
            var myStrings = new Array(
                'Neo...',
                '<br />Wake up, Neo.',
                '<br />The Matrix has you.'
            ), myOptions = {
                charDelay: 100,
                stringDelay: 1000,
                replace: false
            };
        
            $(document).ready(function() {
                
                $('#underline').blink(400);
                
                $('#info').type('This is a jQuery plugin that will "type" text and/or HTML markup into an HTML element.  It accepts multiple strings for a marquee/console style display.  Strings can either be appended to or replace the current string and a callback can be triggered once complete.');
                
                $('#showMe').click(function() {
                    
                    $('#consoleWindow').html('');
    
                    $('#consoleWindow').type(myStrings, myOptions, function() {
                            
                        alert("All done!");
                    });
                });
                
                $('#b').click(function() {
                    
                    $(this).next().html('');
    
                    $(this).next().type(new Array('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus metus diam, porta eget hendrerit et, commodo quis diam. Sed quis turpis dui, eu ullamcorper augue. Donec eget nulla eu est molestie hendrerit in ac tortor. Quisque porta facilisis risus vel ultricies. Integer faucibus mi nec quam congue sagittis. Sed nec mauris mi, ac malesuada diam. Quisque pretium lectus ultricies enim consectetur vitae hendrerit nibh scelerisque. Nunc convallis quam a nunc rhoncus dignissim pharetra turpis tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam sed leo arcu, eu blandit diam. Integer ornare feugiat nisi, vitae cursus velit fringilla vitae. Sed sed congue nunc. Phasellus faucibus adipiscing leo pretium ultrices.</p>','<p>Sed feugiat feugiat feugiat. Nunc id hendrerit sem. Pellentesque vitae augue eu sapien elementum egestas. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus lobortis mollis turpis, ac luctus nulla lacinia non. Aliquam hendrerit ipsum a odio blandit id pulvinar leo cursus. Sed sagittis sapien eget magna aliquam aliquam. Maecenas vulputate dui felis.</p>','<p>Donec arcu metus, euismod id commodo nec, tincidunt sed neque. Suspendisse eros augue, egestas et mollis non, molestie nec tellus. Nulla non leo turpis. Praesent nisl libero, placerat sed imperdiet non, cursus a felis. Aenean tempus tincidunt porta. Cras at leo ante, vel mollis arcu. Duis mollis tincidunt ipsum et vestibulum. Cras lobortis mauris sed mauris tristique eu egestas dolor egestas. Quisque quis purus orci, eget tincidunt dolor. In hac habitasse platea dictumst.</p>','<p>Aenean dapibus, enim ut rutrum venenatis, orci odio elementum risus, eget ultricies metus justo sed neque. Duis sit amet ligula non ligula condimentum tempus. Mauris id nisl adipiscing felis tincidunt feugiat. Pellentesque tempor convallis nisi a tincidunt. Etiam magna mauris, bibendum in consequat quis, vulputate et diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis porttitor, odio sit amet egestas porta, odio quam venenatis arcu, sed viverra sem ipsum a sem. Mauris a nulla felis. In cursus metus at risus luctus ut tristique libero mollis.</p>','<p>Cras id purus mauris, sed eleifend orci. Aenean porta vestibulum metus vel varius. Proin nisi sem, tincidunt eu mattis a, volutpat sed risus. Ut nec eleifend ipsum. Vestibulum non turpis augue. Quisque consectetur enim vel mi accumsan nec elementum tellus sollicitudin. Mauris tincidunt consectetur mi sollicitudin tempus. Pellentesque vitae eros sit amet dolor pulvinar euismod. Curabitur a nisl dui. Etiam iaculis magna arcu. Mauris suscipit aliquet tellus, ac sollicitudin mauris condimentum ac. Integer venenatis nunc ac erat consectetur sollicitudin.</p>'), {charDelay: 1, stringDelay: 1, replace: false});
                });
                
                $('#c').one('click', function() {
                    
                    c($(this).next());
                });
            });
            
            function c(obj) {
    
                obj.type(new Array('Hey there!', 'Look at me type', 'Is this recursive?', 'I think so!'), {}, function() {
                    
                    setTimeout(function() {c(obj)}, 1500);
                });                
            }
        
        </script>
    
    </head>
    
    <body>
        
        <?php include 'include/template/global/header.php' ?>
        
        <?php include 'include/template/global/side.php' ?>
        
        <div id="body"><?php include 'include/template/jquerytype.php' ?></div>
        
        <div class="clear"></div>
    
        <?php include 'include/template/global/footer.php' ?>
        
    </body>
    
</html>