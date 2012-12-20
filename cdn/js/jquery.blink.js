$.fn.blink = function(interval) {
    
    var that = this;    
    interval = interval || 500;
    
    if (this.is(':visible')) this.hide();
    else this.show();
    
    setTimeout(function() { that.blink(interval); }, interval);
}