$(document).ready(function() {

    doTime();

    $(".toggleHints").click(function() {

        $(".hint").toggleClass("active");
    });

    $(".toggleTime").click(function() {

        $(".time").toggleClass("active");
    });

    $(".colorize").click(function() {
        
        colorize = true;
    });
});

var classes = new Array(
    '',
    '.first',
    '.second',
    '.first, .second',
    '.third',
    '.first, .third',
    '.second, .third',
    '.first, .second, .third',
    '.fourth',
    '.first, .fourth'
),
colorize = false;

function doTime() {

    var now = new Date(),
    time = {
        hour: now.getHours(),
        minute: now.getMinutes(),
        sec: now.getSeconds()
    }

    $(".hour.active, .minute.active, .sec.active").removeClass('active');

    for (var thisTime in time) {

        $("." + thisTime).filter('.one').filter(classes[Math.floor(time[thisTime] / 10)]).addClass('active');
        $("." + thisTime).filter('.two').filter(classes[time[thisTime] % 10]).addClass('active');
    }

    $('.time p').text(time.hour + ":" + strpad(time.minute, 2) + ":" + strpad(time.sec, 2));
    
    if (colorize) doColors();

    setTimeout(doTime, 1000);
}

function strpad(number, length) {
   
    var str = '' + number;

    while (str.length < length) str = '0' + str;
   
    return str;
}

function doColors() {

    $('.hou., .minute, .sec').removeAttr('style').filter('.active').css("background",  'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')');

    //setTimeout(colorize, 50); //too fantastic
}
