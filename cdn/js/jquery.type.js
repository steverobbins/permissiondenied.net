/*

    Usage:
    
        $(OBJECT).type(STRINGS, OPTIONS, CALLBACK);
        
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    @@
    @@    OBJECT:
    @@    
    @@        - String
    @@        - Required
    @@        
    @@        The HTML object in which the text will be displayed
    @@        
    @@        
    @@    STRINGS:
    @@    
    @@        - String or Array
    @@        - Required
    @@        
    @@        A string or array of strings containing the text the be applied to the object.
    @@        If an array is given, each text will replaced or be appended to the object.
    @@        
    @@        
    @@    OPTIONS:
    @@    
    @@        - Object
    @@        - Optional
    @@        
    @@        Options are as follows: 
    @@        
    @@            charDelay   : Time in milliseconds between each typed character (Default: 50).
    @@            stringDelay : Time in milliseconds between each typed string (Default: 1500).
    @@            replace     : true or false; If true, will replace text in the object with
    @@                          the next string (Default: true).
    @@            
    @@    
    @@    CALLBACK:
    @@    
    @@        - Object
    @@        - Optional
    @@        
    @@        Function to call after all strings have been iterated.
    @@    
    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        
        
    Example: 
    
    $('#consoleWindow').type(new Array('Neo...', '<br />Wake up, Neo.', '<br />The Matrix has you.'), {
        
        // Any options here will override default values.        
        charDelay: 100,
        stringDelay: 1000,
        replace: false
    }, function() {
        
        // Optional callback        
        alert("All done!");
    });

*/

$.fn.type = function(strings, options, callback) {
    
    new TextType(this, $(strings instanceof Array ? strings : new Array(strings)), options || {}, callback);
}

function TextType(object, strings, options, callback) {
    
    this.object = object;
    this.strings = strings;
    this.stringNum = strings.length;
    this.tag = false;
    this.callback = callback;
    this.options = {
        charDelay: 50,
        stringDelay: 1500,
        replace: true
    };
    
    $.extend(this.options, options);
    
    this.check();
}

TextType.prototype = {
    
    type: function(string, c) {
        
        if (string instanceof Array) string = string[0];
        
        if (c == 0 && !this.options.replace) {
            
            c = this.object.html().length;
            string = this.object.html() + string;
        }
        
        var that = this,
        thisChar = string.substr(c, 1);
        
        if (thisChar == '<') that.tag = true;
        else if (thisChar == '>') that.tag = false;
        
        that.object.html(string.substr(0, c++));
        
        if (c < string.length + 1) {
        
            if (that.tag) that.type(string, c);
            else setTimeout(function(){ that.type(string, c); }, that.options.charDelay);
        }
        else that.check();
    },
    check: function() {
        
        var that = this;
    
        if (that.strings.length > 0) {
            
            setTimeout(function() {
            
                if (that.options.replace) that.object.empty();
                
                that.type(that.strings.splice(0, 1), 0);                
            }, that.stringNum == that.strings.length ? 1 : that.options.stringDelay);
        }
        else if (that.callback) that.callback();
    }
}